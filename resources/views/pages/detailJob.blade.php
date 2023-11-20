@extends('pages.cpanel')

@section('content')

    <div class="m-2 p-3 shadow-md rounded-md h-full border -mt-2" style="font-family: Arial, Helvetica, sans-serif">
        <h2 class="text-center font-bold text-xl border-b">Detail Project</h2>
        <div class="p-3 mt-3 md:grid md:grid-cols-2 md:gap-2 border-b">
            <table class="w-full h-full border-r-2">
               @foreach ($data as $item)
                    <tr>
                        <td class="w-36 font-semibold"> {{ $item->user->role }}  </td>
                        <td> : </td>
                        <td> {{ $item->user->name }} </td>
                    </tr>
                    <tr>
                        <td class="w-36 font-semibold">Project Name </td>
                        <td> : </td>
                        <td> {{ $item->client->details }} </td>
                    </tr>
                    @php
                        $role = Auth::user()->role;
                    @endphp
                    <tr>
                        <td class="w-36 font-semibold">Status Project </td>
                        <td> : </td>
                        <td>
                            <select name="statusProject" id="statusProject" class="px-3" 
                                    @if($role == "Employee")
                                        disabled
                                    @endif
                                >
                                @if (Auth::user()->role == "Project Manager")
                                    @if ($item->status == "Done")
                                        
                                        <option selected> Done </option>
                                        <option> Rejected </option>
                                        <option> Accepted </option>

                                    @elseif ($item->status == "Rejected")
                                        <option > On Progress </option>
                                        <option> Done </option>
                                        <option selected> Rejected </option>
                                            <option> Requested </option>
                                    @elseif ($item->status == "Requested")
                                        <option> Done </option>
                                        <option> Rejected </option>
                                        <option selected> Requested </option>
                                    @elseif ($item->status == "On Progress")
                                        <option selected> On Progress </option>
                                        <option> Done </option>
                                        <option> Rejected </option>
                                        <option> Requested </option>
                                    @endif

                                @else
                                    @if ($item->status == "Rejected")
                                        <option selected> Rejected </option>
                                        @if($role == "Project Manager")
                                            <option> Requested </option>
                                        @endif
                                    @elseif($item->status == "Requested")
                                        @if($role == "Project Manager")
                                            <option> Rejected </option>
                                        @endif
                                        <option selected> Requested </option>
                                    @elseif($item->status == "Done")
                                        <option selected> Done </option>    
                                    @elseif($item->status == "On Progress")
                                        <option> Requested </option>
                                        <option selected> On Progress </option>    
                                    @endif
                                @endif
                            </select>
                        </td>
                    </tr>
               @endforeach
            </table>
            @if (Auth::user()->role != "Project Manager")
                <div class="">
                    <h2 class="text-center font-semibold">Work In Today</h2>
                    <form action="{{ '/admin/insertJob' }}" method="post" class="p-3">
                        @csrf
                        @foreach ($data as $item)
                            <input type="text" name="idUser" id="idUser" value="{{ $item->id }}" hidden>
                            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" hidden>
                            <input type="text" name="idClient" value="{{ $item->client_id }}" hidden class="idClient">
                            @endforeach
                            <input type="text" name="sendStatus" id="sendStatus" class="border" placeholder="Status Project" value="On Progress" hidden>
                        <textarea name="descJob" id="descJob" class="border shadow w-full placeholder:p-1 focus:p-1" placeholder="Masukan Pekerjaan Yang sedang Dilakukan Hari Ini"
                        @if($role == "Employee")
                            @if($item->status == "Done")
                                readonly                     
                            @endif
                        @endif
                        ></textarea>
                        <div class="w-full flex justify-end">
                            <button class="bg-blue-900 px-5 py-1 mr-2 text-white font-semibold shadow rounded-md
                            @if($role == "Employee")
                                @if($item->status == "Done")
                                    bg-gray-400
                                @endif
                            @endif
                            "
                            @if($role == "Employee")
                                @if($item->status == "Done")
                                    disabled                     
                                @endif
                            @endif
                            >Submit</button>
                        </div>
                    </form>
                </div>
            @endif
        </div>

        <div class="p-3">
            <h2 class="font-semibold">Progress Description</h2>
            <div class="overflow-y-auto h-[350px]">
                <div class="mt-2 ">
                       @if ($progres->count() > 0)
                        @foreach ($progres as $item)
                        <div class=" bg-gray-400/30 rounded-md w-full h-full p-1 mb-3 grid @if ($item->role == "Project Manager") shadow font-semibold bg-[#15233b] text-white @endif">

                                <div class="text-[#15233b] w-full p-1 @if ($item->role == "Project Manager") flex flex-row-reverse @else grid grid-cols-2 gap-3 @endif">
                                    <span class="w-full
                                    font-bold
                                    @if($item->role == "Project Manager")
                                        text-right text-[#19b3ca]
                                    @else
                                        text-left
                                    @endif
                                    ">
                                        @if ($item->role == "Project Manager")
                                            <sup class="text-red-400 ">Evaluasi</sup>
                                            
                                            {{ $item->name }}
                                        @else
                                            {{ $item->name }}
                                        @endif
                                    </span>
                                    <sup class=" pt-4 font-semibold @if ($item->role == "Project Manager") text-white w-full text-left @else text-right @endif">
                                        {{ $item->created_at }}
                                    </sup>
                                </div>
                                <p class="text-justify p-1 @if ($item->role == "Project Manager") text-end @endif">
                                    {{ $item->deskripsi }}
                                </p>
                            </div>
                        @endforeach
                        
                        @else
                            <div class="border w-full h-full p-1 mb-1 ">
                                <div class=" p-1 text-slate-400 text-center">
                                <h3>No Record Data</h3>
                            </div>
                       @endif

                    </div> 
                </div>
                @if (Auth::user()->role == "Project Manager")
                    <div class="p-3 rounded-md shadow text-white font-semibold border-t">
                        <form action=" {{ '/admin/insertEvaluasi' }} " method="post" class="">
                            @csrf

                            @foreach ($data as $item)
                                <input type="text" name="idProgres" value="{{ $item->id }}" class="border-red border-2 text-black" hidden>
                                <input type="text" name="name" value="{{ Auth::user()->name }}" class="border-red border-2 text-black" hidden>
                                <input type="text" name="idClient" value="{{ $item->client_id }}" hidden class="idClient">
                            @endforeach
                            <input type="text" name="sendStatus" id="sendStatus1" class="border" placeholder="Status Project" hidden>
                            <textarea name="EvaluasiText" id="EvaluasiText" placeholder="Evaluasi" class="border w-full p-1 text-black font-normal" hidden></textarea>
                            <div class="flex">
                                <button type="button" id="btnEvaluasi" class="w-full bg-blue-500 py-2 rounded-md m-1" onclick="evaluasiFunct()" value="Evaluasi">Evaluasi</button>
                                <button type="submit" id="btnSubmit" class="w-full bg-blue-500 py-2 m-1 transition-all duration-700 ease-in-out" hidden>Submit</button>
                            </div>
                        </form>
                    </div>
                @endif
        </div>

    </div>

    

@endsection