@extends('pages.cpanel')

@section('content')

<div class="details" style="grid:none !important;">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Report Project</h2>
            <div class="flex">
                {{-- inline-block --}}
                <div class="relative mx-2 hidden " id="compTahun">
                    <select name="filterTahun" id="filterTahun" class="block pr-10 appearance-none w-full bg-white border border-gray-300 py-2 px-4 rounded-md shadow-sm focus:outline-none focus:border-blue-500">
                        @for ($year = date("Y"); $year >= 1; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                    <div class="pointer-events-none ml-2 absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M14.293 5.293a1 1 0 011.414 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L10 10.586l4.293-4.293z"/>
                        </svg>
                    </div>
                </div>
                {{-- Bulan --}}
                <div class="relative mx-2 hidden" id="compBulan">
                    <select name="filterBulan" id="filterBulan" class="pr-9 block appearance-none w-full bg-white border border-gray-300 py-2 px-4 rounded-md shadow-sm focus:outline-none focus:border-blue-500">
                        @php
                            $months = [
                                'January', 'February', 'March', 'April', 'May', 'June', 'July',
                                'August', 'September', 'October', 'November', 'December'
                            ];
                        @endphp
                        @foreach($months as $key => $month)
                            <option value="{{ $key + 1 }}">{{ $month }}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M14.293 5.293a1 1 0 011.414 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L10 10.586l4.293-4.293z"/>
                        </svg>
                    </div>
                </div>
                {{-- Periode --}}
                <div id="compPeriode" class="hidden">
                    <input type="date" name="dateFrom" id="dateFrom" class="px-2 rounded py-1">
                    <input type="date" name="dateTo" id="dateTo" class="px-2 rounded py-1">
                </div>
                <button id="submitFilter" class="hidden px-3 py-1 bg-blue-500 text-white active:scale-95 rounded-md">Submit</button>
            </div>
              
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none mb-3 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Filter <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
            </button>
            
            <!-- Dropdown menu -->
            <div id="dropdown" class="z-10 hidden bg-blue-700 divide-y w-28 divide-gray-100 rounded-lg shadow ">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <button value="Tahun" class="pointer dropListFilter block w-full px-4 py-2 hover:bg-gray-100/40 dark:hover:bg-gray-100/40 dark:hover:text-white">Tahun</button>
                    </li>
                    <li>
                        <button value="Bulan" class="pointer dropListFilter block w-full px-4 py-2 hover:bg-gray-100/40 dark:hover:bg-gray-100/40 dark:hover:text-white">Bulan</button>
                    </li>
                    <li>
                        <button value="Periode" class="pointer dropListFilter block w-full px-4 py-2 hover:bg-gray-100/40 dark:hover:bg-gray-100/40 dark:hover:text-white">Periode</button>
                    </li>
                </ul>
                <div class="py-2">
                    <button value="AllData" class="pointer dropListFilter text-white block w-full px-4 py-2 hover:bg-gray-100/40 dark:hover:bg-gray-100/40 dark:hover:text-white">All Data</button>
                </div>
            </div>
    
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
                        <td>
                            @if (!empty($value->pmUser->name))
                                {{$value->pmUser->name }}
                            @else
                                -
                            @endif
                        </td>
                        <td> {{ $value->user->name }} </td>
                        <td>{{ date('d F Y', strtotime($value->created_at)) }}</td>

                        <td>Rp. {{ number_format($price, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
           
        </table>
       </div>

        <div id="tableFilter" class="hidden">
            <div id="printer">

            </div>
            @php
                $price = 1500000;
            @endphp
            <div class="md:h-96 overflow-auto">
                <div class="grid grid-rows border-b">
                    <div class="border-b mb-1 font-bold pb-2 flex justify-between w-full px-4 text-left">
                        <div class="w-full">No</div>
                        <div class="w-full">Project</div>
                        <div class="w-full">Project Manager</div>
                        <div class="w-full">Programmer</div>
                        <div class=" text-left w-full">Price</div>
                    </div>
                    <div class="flex flex-col recordData"  id="">
                        <div class="flex justify-between w-full px-4">
                            
                            {{-- Rp. {{ number_format($price, 0, ',', '.') }} --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full h-8 shadow border px-4 flex mt-2 justify-between bg-blue-900 text-white font-semibold">
                <span class="">
                    Total : 
                </span>
                <span class="w-[190px] totalRekapHarga" id="">
                    
                </span>
            </div>
        </div>

    </div>
</div>

@endsection