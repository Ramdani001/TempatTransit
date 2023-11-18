<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = "project";
    protected $fillable = [
        'user_id',
        'project_id',
        'status',
        'taskdescription',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function client(){
        return $this->belongsTo(Client::class, 'client_id', 'id');

    }

    // public function showProject($id){
    //     $project = Project::findOrFail($id);

    //     $client = $project->client;

    //     $clientName = $client->name;
    //     $clientPhone = $client->phone;
    //     $clientAddress = $client->address;
    //     $clientDetails = $client->details;
    //     $clientPrices = $client->prices;

    //     return view('views.project', [
    //         'project' => $project,
    //         'client' => $client,
    //     ]);
    // }
}

