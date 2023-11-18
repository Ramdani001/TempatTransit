@extends('pages.cpanel')

@section('content')

{{-- ==== Cards ==== --}}
<div class="cardBox">
    <div class="card">
        <div>   
            <div class="numbers">{{$totproject}}</div>
            <div class="cardName">Projects</div>
        </div>
        <div class="iconBox">
            <ion-icon name="library-outline"></ion-icon>
        </div>
    </div>
    
    <div class="card">
        <div>   
            <div class="numbers">{{ $totclient }}</div>
            <div class="cardName">Client</div>
        </div>
        <div class="iconBox">
            <ion-icon name="people-outline"></ion-icon>
        </div>
    </div>

    <div class="card">
        <div>   
            <div class="numbers">?</div>
            <div class="cardName">Task</div>
        </div>
        <div class="iconBox">
            <ion-icon name="receipt-outline"></ion-icon>
        </div>
    </div>

    <div class="card">
        <div>   
            <div class="numbers">{{ $employees }}</div>
            <div class="cardName">Employees</div>
        </div>
        <div class="iconBox">
            <ion-icon name="accessibility-outline"></ion-icon>
        </div>
    </div>
</div>

{{-- === Order List === --}}

<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Recent Order</h2>
            <a href="#" class="btn">View All</a>
        </div>
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Client</td>
                    <td>Projects</td>
                    <td>Programer</td>
                    <td>Status</td>
                </tr>
            </thead>
            
            @foreach($projects as $dash => $value)
            <tr>
                <td>{{$dash +1}}
                <td>{{$value->client->name}}</td>
                <td>{{$value->client->details}}</td>
                <td>{{$value->user->name}}</td>
                <td>{{$value->status}}</td>
                {{-- <td>{{$value->status}}</td> --}}
                {{-- <td><td> --}}
            </tr>
            @endforeach
        </table>
    </div>

    {{-- === New Client === --}}

    <div class="recentCostumers">
        <div class="cardHeader">
            <h2>Recent Costumer</h2>
        </div>
    <table>
        <tr>
            <td width="60px">
                <div class="imgBox"><img src="/assets/img/finn.jpg" ></div>
            </td>
            <td>
                <h4>David Wilson <br> <span>Polandia</span></h4>
            </td>
        </tr>
        
        <tr>
            <td width="60px">
                <div class="imgBox"><img src="/assets/img/finn.jpg" ></div>
            </td>
            <td>
                <h4>David Wilson <br> <span>Polandia</span></h4>
            </td>
        </tr>

        <tr>
            <td width="60px">
                <div class="imgBox"><img src="/assets/img/finn.jpg" ></div>
            </td>
            <td>
                <h4>David Wilson <br> <span>Polandia</span></h4>
            </td>
        </tr>

        <tr>
            <td width="60px">
                <div class="imgBox"><img src="/assets/img/finn.jpg" ></div>
            </td>
            <td>
                <h4>David Wilson <br> <span>Polandia</span></h4>
            </td>
        </tr>
        
        <tr>
            <td width="60px">
                <div class="imgBox"><img src="/assets/img/finn.jpg" ></div>
            </td>
            <td>
                <h4>David Wilson <br> <span>Polandia</span></h4>
            </td>
        </tr>

        <tr>
            <td width="60px">
                <div class="imgBox"><img src="/assets/img/finn.jpg" ></div>
            </td>
            <td>
                <h4>David Wilson <br> <span>Polandia</span></h4>
            </td>
        </tr>

        <tr>
            <td width="60px">
                <div class="imgBox"><img src="/assets/img/finn.jpg" ></div>
            </td>
            <td>
                <h4>David Wilson <br> <span>Polandia</span></h4>
            </td>
        </tr>
    </table>
    </div>
</div>
</div>
@endsection