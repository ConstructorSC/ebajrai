{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html> --}}

<!DOCTYPE html>

<html>
    
    <head>
        <title> E-Bajrai Mini Market | All Item </title>
        <link rel="shortcut icon" href={{ asset('images/logo.png') }}>
        <link rel="stylesheet" href="{{ asset('css/base_style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/shop_style.css') }}">
        @livewireStyles
        
         <script type="text/javascript">
            
            function addedtocart() {
                alert("Item added to cart!");
            }
            
        </script>
        @livewireScripts
    
    </head>
    
    <body>
        
        <div class="top">
            <img src="{{ asset('images/logo.png') }}" width="80pixels" height="80pixels">
            <div style="padding-top: 25px"> E-Bajrai Mini Market </div>
            <div class="menu">
                <div> <a href="{{ route('aboutshop') }}"> About </a> </div>
                <div> <a href="{{ route('home1') }}">  Shop  </a> </div>
                <div> <a href="/cart"> Cart </a> </div>
                <div> <a href="order.html"> Order </a> </div>
            </div>
            

            @if(Route::has('login'))
                @auth 
                    @if(Auth::user()->utype === 'ADM')
                    <div class="dropdown">
                        <div class="user dropbtn"> <a href="profile.html"><img src="images/user.jpg" width="35pixels" height="35pixels"></a> </div>
                        <div class="dropdown-content">
                            <a href="{{ route('home1') }}">Home</a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                @csrf    
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="dropdown">
                        <div class="user dropbtn"> <a href="profile.html"><img src="images/user.jpg" width="35pixels" height="35pixels"></a> </div>
                        <div class="dropdown-content">
                            <a href="">My Account</a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                @csrf    
                            </form>
                        </div>
                    </div>
                    @endif
                @else
                <div class="user"> <a href="{{ route('register') }}"><img src="{{ asset('images/user.jpg') }}" width="35pixels" height="35pixels"></a> </div>   
                @endif
            @endif
        </div>
        
        {{$slot}}
        
        <br><br>
        <!--<footer>
            <p>© Copyright 2021 Bajrai Mini Market, Inc.</p>
        </footer>-->
    </body>

</html>
