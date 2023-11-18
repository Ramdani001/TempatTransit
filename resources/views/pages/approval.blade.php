@extends('pages.cpanel')
@section('content')
    
    <div class="todo">
        <div class="tdl">
            <div class="cardBoxApp">
                <div class="cardApp">
                    <div class="iconBox">
                        <ion-icon name="mail-unread-outline" style="color: #10c0b1 !important"></ion-icon>
                    </div>
                    <div>   
                        <div class="numbers" >24</div>
                        <div class="cardName" >Approval Order</div>
                    </div>
                </div>

                <div class="cardApp">
                    <div class="iconBox">
                        <ion-icon name="notifications-outline" style="color: #F29339 !important"> </ion-icon>
                    </div>
                    <div>   
                        <div class="numbers" >24</div>
                        <div class="cardName" >Pending Order</div>
                    </div>
                </div>

                <div class="cardApp">
                    <div class="iconBox">
                        <ion-icon name="checkmark-circle-outline" style="color: rgb(31, 70, 241) !important"></ion-icon>
                    </div>
                    <div>   
                        <div class="numbers" >24</div>
                        <div class="cardName" >Complete Order</div>
                    </div>
                </div>
            </div>


            <div id="default-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Add New Client
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->

                        <div class="relative flex flex-col align-content-center px-4 py-4">
                            {{-- @foreach($clients as $client ) --}}

                          <form method="post" class="grid grid-cols-4 gap-4" action="{{ '/InsertProject' }}">

                              {{csrf_field()}}
                              <input type="hidden" class="from-control" id="v_id" name="v_id" value="">
                              {{-- @method('post') --}}
                              {{-- <td class="">{{$client->id}}</td> --}}
                              <div class="col-span-2">
                                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Client name</label>
                                  <input type="text" name="name" id="v_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="full name" value="" readonly>
                              </div>
                              <div class="col-span-2">
                                  <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Client email</label>
                                  <input type="text" name="email" id="v_email" placeholder="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" readonly>
                              </div>
                              <div class="col-span-2">
                                  <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Client phone</label>
                                  <input type="text" name="phone" id="v_phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="+62 xxxxxxxx" readonly>
                              </div>
                              <div class="col-span-2">
                                  <label for="prices" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prices</label>
                                  <input type="text" name="prices" id="v_prices" placeholder="$999" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" readonly>
                              </div>
                              <div class="col-span-2">
                                  <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                  <textarea type="text" name="address" id="v_address" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your address here" readonly></textarea>
                              </div>
                              <div class="col-span-2">
                                  <label for="details" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Details</label>
                                  <textarea type="text" name="details" id="v_details" id rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Details" readonly></textarea>
                              </div>
                              <div class="col-span-2">
                                <label for="prices" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Programmer</label>
                                <select id="programmer" name="programmer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @if ($roles->count())
                                        @foreach($roles as $user)
                                            @if ($user->role == 'Employee')
                                                <option value="{{ $user->id}}" {{$rolesUser == $user->id ? 'selected="selected"' : ''}}>{{ $user->name }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                  </select>
                                </div>
                                {{-- <div class="col-span-2">
                                    <label for="prices" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                    <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option value="Status On Progess">Status On Progress</option>
                                      </select>
                                </div> --}}
                                <br>
                              <div class="col-span-1 ">
                                  <label for="" class=""><br></label>
                                  <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                              </div>

                          </form>
                          {{-- @endforeach --}}

                      </div>
                    </div>
                </div>
            </div>

            {{-- List Approval --}}
            <div class="details" style="grid:none !important;">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Approval List</h2>
                    </div>
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th style="display:none;">ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Order Since</th>
                                <th>Details</th>
                                <th style="display:none;"></th>
                                <th style="display:none;"></th>
                                <th style="display:none;"></th>

                            </tr>
                        </thead>
                        @foreach($clients as $client)
                            <tr>
                                <td style="display:none;" class="id">{{$client->id }}</td>
                                <td class="name">{{ $client->name }}</td>
                                <td class="phone">{{ $client->phone }}</td>
                                <td class="email">{{ $client->email }}</td>
                                <td style="display:none;" class="prices">{{$client->prices }}</td>
                                <td style="display:none;" class="address">{{$client->address }}</td>
                                <td style="display:none;" class="details">{{$client->details }}</td>
                                <td class="created_at">{{ $client->created_at }}</td>
                                <td class="">
                                    <button data-modal-target="default-modal" data-id="'.$client->id." data-modal-toggle="default-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-md px-6 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 userView" type="button">
                                        View
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection