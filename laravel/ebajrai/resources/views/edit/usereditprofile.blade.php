<!DOCTYPE html>

<html>

<head>

        <title> E-Bajrai | Edit Profile </title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/base_style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/shop_style.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

        <style>
            body {
                background-color: #F5F8F2;
                color: darkslategray;
                font-size: 15px;
            }

            .container {
                display: flex;
                justify-content: center;
            }

            .user_card{
                height: 650px;
                width: 600px;
                padding: 20px 80px 20px 80px;
                background-color: white;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                border-radius: 5px;
            }

            .bahagi {
                display: grid;
                grid-template-columns: 140px 350px;
                grid-template-rows: 40px 40px 40px 40px;
                grid-row-gap: 15px;
            }

            .kotak {
                background-color: #f5f4f2;
                width: 85%;
                padding: 10px;
                border: 1px solid gainsboro;
                border-radius: 0.5em;
            }

            button {
                background-color: #53B175;
                color: white;
                border: 2px solid #53B175;
                width: 40%;
                height: 35px;
                border-radius: 10px;
            }
            .col-md-9{
                padding-left: 120px;
            }
        </style>

    </head>

    <body>
        <div class="top">
            <img src="{{ asset('images/logo.png') }}" width="80pixels" height="80pixels">
            <div style="padding-top: 25px"> E-Bajrai Mini Market </div>
            <div class="menu">
                <div> <a href="shop_details.html"> About </a> </div>
                <div> <a href="{{ route('home1') }}">  Shop  </a> </div>
                <div> <a href="/cart"> Cart </a> </div>
                <div> <a href="order.html"> Order </a> </div>
            </div>
        <div class="dropdown">
            <div class="user dropbtn"> <a href="{{ route('user.profile') }}"><img src="{{ asset('images/user.jpg') }}" width="35pixels" height="35pixels"></a> </div>
            <div class="dropdown-content">
                <a href="{{ route('user.profile') }}">My Account</a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf    
                </form>
            </div>
        </div>
        </div>

        <br><br>
        <div class="container">
            <div class="user_card">

                <h1 style="text-align: center"> Update Profile </h1>
                <hr class="mb-3">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif

                <form action="/updateprofile" method="POST" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <br><br>
                    <div class="bahagi">
                        <div> Profile Picture </div>
                        <input type="file" class="form-control" style="background-color: white; border: none" name="image" value="{{ $user->profile->image }}"/>
                        <div> Full name </div>
                        <input type="text" class="form-control" name="name" value=" {{ $user->name }} "/>
                        <div> Email </div>
                        <input type="text" class="form-control" name="email" value="{{ $user->email }}" disabled/>
                        <div> Phone Number </div>
                        <input type="text" class="form-control" name="phone" value="{{ $user->profile->phone }}"/>
                        <div> Address </div>
                        <textarea class="form-control" name="address" rows="5">{{ $user->profile->address }}</textarea>
                    <br><br>
                    
                    <div style="display: flex; justify-content: flex-end"><button type="submit"> Update Profile </button></div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>