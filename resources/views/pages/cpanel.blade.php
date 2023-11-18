<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/assets/img/tt2.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tempat Transit | CPanel</title>

    {{-- ===== Styles CSS ===== --}}
    @vite('resources/css/app.css')
    @include('partials.styling')
</head>
<body>
    {{-- ============= Navigation ============== --}}
    
    @include('layouts.sidebar')
        {{-- ==== Main ==== --}}
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu"></ion-icon>
                </div>
            
                <div class="search">
                    <label for="">
                        {{-- <input type="tex" placeholder="Search Here">
                        <ion-icon name="search"></ion-icon> --}}
                    </label>
                </div>
            
                <div class="user">
                    <img src="/assets/img/finn.jpg" alt="">
                </div>
            </div>
                @yield('content')
        </div>

    {{-- ==== Script ==== --}}
    @include('partials.scripts')
</body>
</html>