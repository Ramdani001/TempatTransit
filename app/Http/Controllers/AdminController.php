<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\ProgresModels;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;

class AdminController extends Controller
{
    public function index(){
       return view('/pages/dashboard');
    } 

    public function dashboard(){
        $clients = Client::all();
        
        if(Auth::user()->role == "Employee" ){
            $totproject = Project::where('status', '!=', 'Pending')
            ->where('user_id', Auth::user()->id)
            ->count();
            $totclient = Client::count();
        }else{
            $totproject = Project::where('status', '!=' ,'Pending')->count();
            $totclient = Client::count();
        }

        $employees = User::where('id', '!=', 6)->count();

        if(Auth::user()->role == "Employee"){
            $projects = Project::where('status', '!=','Pending')
            ->where('user_id', Auth::user()->id)
            ->get();
        }else{
            $projects = Project::where('status', '!=','Pending')->get();
        }


        $clientpro = Client::with('project')->get();
        $userpro = User::with('project')->get();

        // dd($totproject);
        
        return view('pages.dashboard', compact('clients', 'totclient', 'employees', 'projects', 'clientpro', 'userpro', 'totproject'));
        

    }

    public function project(){
        $userID = Auth::id();
        $clients = User::all();
        $project = Project::where('user_id', $userID)->get();
        $projects = Project::with('user')->get();
        $clientpro = Client::with('project')->get();
        $userpro = User::with('project')->get();
        return view('pages.project', compact('clients', 'projects', 'clientpro', 'userpro', 'project'));
    }
    
    public function approval(){
        $clients = Client::where('status', 'Pending')->get();
        $roles = User::all();
        $rolesUser = User::first()->id;
        // $users = Client::findOrFail();
        return view('pages.approval', compact('clients', 'roles', 'rolesUser'));
    }

    public function client(){
        $roles = User::all();
        $clients = Client::all();
        $rolesID = Project::where('client_id')->get();
        $data = Project::where('status','Pending')->get();
        // dd($data);
        return view('pages.client', compact('clients', 'roles' , 'data'));
    }

    public function progres(){
        $roles = User::all();
        $clients = Client::all();
        $rolesID = Project::where('client_id')->get();
        $project = Project::where('status', '!=', 'Pending')->get();

        return view('pages.project', \compact('clients', 'roles', 'project'));
 
    }

    public function store(Request $request){

        $insert = new Client;
        $insert->name = $request->name;
        $insert->phone = $request->phone;
        $insert->email = $request->email;
        $insert->address = $request->address;
        $insert->details = $request->details;
        $insert->prices = $request->prices;
        $insert->status = $request->status ?: 'Pending';


        $insert->save();
        $getProject = 0;
        $getUser = 0;
        $postPro = Client::where('email', $request->email)->get();
        $userID = User::where('id', 6)->get();
        
        foreach($postPro as $data){
            $getProject = $data->id;
        }

        foreach($userID as $data){
            $getUser = $data->id;
        }
       
        // dd($userID);

        $Postproject = new Project;
        $Postproject->user_id = $getUser;
        $Postproject->client_id = $getProject;
        $Postproject->status = "Pending";
        $Postproject->taskDescription = "-";


        $Postproject->save();

        // $newClient = Client::create($data);

        return redirect(route('pages.client'));
    }

    public function InsertProject(Request $request){
        // dd($request);
        $id = $request->v_id;
        $affected = Project::where('client_id', $id)
            ->update([
            'pm_id'=> Auth::user()->id,
            'user_id'=> $request->programmer,
            'status'=> 'On Progress'
            ]);

        $updateClient = Client::where('id', $id)
            ->update([
            'status' => 'On Progress'
            ]);
        return redirect(route('pages.approval'));
    }

    public function detailJob(Request $request){

        
        $data = Project::where('id', $request->idSend)->get();
        $progres = ProgresModels::where('project_id', $request->idSend)->get();
        
        return view('pages.detailJob', \compact('data', 'progres'));
    }

    public function insertJob(Request $request){
        
        
        $affected = Project::where('id', $request->idUser)
            ->update([
            'taskdescription'=> $request->descJob,
            'status'=> $request->sendStatus,
        ]);

        $updateClient = Client::where('id', $request->idClient)
            ->update([
            'status' => $request->sendStatus
        ]);
 

        $insert = new ProgresModels;
        $insert-> project_id = $request->idUser;
        $insert-> deskripsi = $request->descJob;
        $insert-> role = 'Employe';
        $insert->save();

        $data = Project::where('id', $request->idUser)->get();
        $progres = ProgresModels::where('project_id', $request->idUser)->get();
        

        return back()->with(compact('data', 'progres'));


    }

    public function insertEvaluasi(Request $request){
        // dd($request);
        $idProgres = $request->idProgres;
        $EvaluasiText = $request->EvaluasiText;

        
        $affected = Project::where('id', $request->idProgres)
            ->update([
            'status'=> $request->sendStatus,
        ]);

        $updateClient = Client::where('id', $request->idClient)
            ->update([
            'status' => $request->sendStatus
        ]);


        $insert= new ProgresModels;
        $insert-> project_id = $idProgres;
        $insert-> deskripsi = $EvaluasiText;
        $insert-> role = "Project Manager";
        $insert->save();

        $data = Project::where('id', $idProgres)->get();
        $progres = ProgresModels::where('project_id', $request->idProgres)->get();

        if($insert){
            return back()->with(compact('data', 'progres'));

        }
        
    }


    public function reportProject(){

        $data = Project::all();

        return view('pages.reportProject', \compact('data'));
    }

    // Filter Report Project
    
    public function filterReport(Request $request){
        $status = $request->status;


        if($status == "Tahun"){
            
            $tahun = $request->tahun;

            $filterTahun = Project::leftJoin('users', 'project.user_id', '=', 'users.id')
            ->leftJoin('users as pm_users', 'project.pm_id', '=', 'pm_users.id')
            ->leftJoin('tb_client', 'project.client_id', '=', 'tb_client.id')
            ->select(
                'project.*', // Kolom dari tabel projects
                'users.name as employee', // Kolom name dari tabel users, alias sebagai user_name
                'pm_users.name as projectManager', // Kolom name dari tabel users (sebagai pmUser), alias sebagai pm_user_name
                'tb_client.details as judulProject', // Kolom name dari tabel clients, alias sebagai client_name
                'tb_client.prices as prices' // Kolom name dari tabel clients, alias sebagai client_name
            )
            ->whereYear('project.created_at', $tahun)
            ->get();

            return response()->json([
                'status'=> 200,
                'filterTahun' => $filterTahun
            ]);

        }else if($status == "Bulan"){
            
            $tahun = $request->tahun;
            $bulan = $request->bulan;

            $filterBulan = Project::whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bulan)
            ->get();


            return response()->json([
                'status'=> 200,
                'filterBulan' => $filterBulan
            ]);

        }else if($status == "Periode"){

            $dateFrom = $request->dateFrom;
            $dateTo = $request->dateTo;

            $filterTanggal = Project::whereRaw("DATE(created_at) BETWEEN ? AND ?", [$dateFrom, $dateTo])
            ->get();

            return response()->json([
                'status'=> 200,
                'filterTanggal' => $filterTanggal
            ]);
            
        }


    }

    // Filter Report Project

}
