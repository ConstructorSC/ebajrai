<!DOCTYPE html>

<html>

<head>

        <title> E-Bajrai | Profile </title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/astyle.css">
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
                padding: 8px 10px 10px 10px;
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

            #del{
                background-color: red;
                color: white;
                border: 2px solid red;
                width: 100%;
                height: 35px;
                border-radius: 10px;
            }

            .besar{
                height: 60px;
                overflow: auto;
            }

            .col-md-9{
                padding-left: 120px;
            }
        </style>

    </head>

    <body>
        <br><br>
        <div class="container">
            <div class="user_card">

                <h1 style="text-align: center"> Profile </h1>
                <hr class="mb-3">
                
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <div class="col-md-9">
                        @if($user->profile->image)
                            <img src="{{asset('images/profile')}}/{{$user->profile->image}}" width="100%" />
                        @else
                            <img src="{{asset('images/profile/default.png')}}" width="100%" />
                        @endif
                </div>
                <br><br>
                <div class="bahagi">
                    <div> Full name </div>
                    <div class="kotak">{{$user->name}}</div>
                    <div> Email </div>
                    <div class="kotak">{{$user->email}}</div>
                    <div> Phone Number </div>
                    <div class="kotak">{{$user->profile->phone}}</div>
                    <div> Address </div>
                    <div class="kotak besar">{{$user->profile->address}}</div>
                    <br><br><br>
                
                    <form action="/user/editprofile/{{ $user->id }}">
                        <div style="position: relative; left:160px; top:23px;"><button type="submit"> Update Profile </button></div>
                    </form>
                    <form action="/deleteprofile/{{ $user->id }}" onsubmit="return confirm('Are you sure you want to delete this account?')">
                        <div style="position: relative; bottom:60px"><button id="del" type="submit"> Delete Account </button></div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>