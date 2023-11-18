@extends('pages.cpanel')

@section('content')

<div class="details" style="grid:none !important;">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Report Project</h2>
            <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block mb-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            
                <div>

                </div>

                <span class="text-xl px-2 py-1">Filter</span>
            
              </button>
        </div>
       <div class="" id="fullTable">
        <table id="example" class="display" style="width:100%" >
            <thead>
                <tr>
                    {{-- <th>No</th> --}}
                    <th>No</th>
                    <th>Nama Project</th>
                    <th>Project Manager</th>
                    <th>Programmer</th>
                    <th>Tanggal</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item => $value)
            @php
                $price = $value->client->prices;
            @endphp
                    <tr>
                        <td> {{ $item+1 }} </td>
                        <td>{{ $value->client->details }}</td>
                        <td> {{$value->pmUser->name }} </td>
                        <td> {{ $value->user->name }} </td>
                        <td>{{ date('d F Y', strtotime($value->created_at)) }}</td>

                        <td>Rp. {{ number_format($price, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
           
        </table>
       </div>

        <div id="tableFilter" class="hidden">
            @php
                $price = 1500000;
            @endphp
            <div class="grid grid-rows border-b ">
                <div class="border-b mb-1 font-bold pb-2 flex justify-between w-full px-4 text-left">
                    <div class="w-full">No</div>
                    <div class="w-full">Project</div>
                    <div class="w-full">Project Manager</div>
                    <div class="w-full">Programmer</div>
                    <div class=" text-left w-full">Price</div>
                </div>
                <div class="flex justify-between w-full px-4">
                    <span class="w-full text-left">1</span>
                    <span class="w-full text-left">Portal Berita</span>
                    <span class="w-full text-left">Bill Wilson</span>
                    <span class="w-full text-left">Jumanji</span>
                    <span class="w-full text-left">Rp. {{ number_format($price, 0, ',', '.') }}</span>
                </div>
            </div>

            <div class="w-full h-8 shadow border px-4 flex  justify-between bg-blue-900 text-white font-semibold">
                <span class="">
                    Total : 
                </span>
                <span class="w-[190px]">
                    Rp. {{ number_format($price, 0, ',', '.') }}
                </span>
            </div>
        </div>

    </div>
</div>

@endsection