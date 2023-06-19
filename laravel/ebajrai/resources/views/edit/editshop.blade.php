<!DOCTYPE html>

<html>

    <head>

        <title> About Us </title>
        <link rel="stylesheet" href="{{ asset('css/base_style.css') }}">


        <style media="screen">
          .container{
            background: white;
            width: 800px;
            height: 550px;
            margin-top: 30px;
            margin-left: auto;
            margin-right: auto;
            border-radius: 0.8em;
            padding-top: 20px;
          }
          textarea{
            vertical-align: top;
          }
          .kotak{
            padding-top: 10px;;
          }
          b{
            color: #53B175;
          }
          form{
            padding-left: 100px;
          }
          .submitButton{
            float: right;
            padding-right: 70px;
          }
        </style>
        @livewireStyles
        @livewireScripts

    </head>

    <body>

        <div class="top">
            <img src="{{ asset('images/logo.png') }}" width="80pixels" height="80pixels">
            <div style="padding-top: 25px"> E-Bajrai Mini Market </div>
            <div class="menu">
                <div> <a href="{{ route('aboutshop') }}"> About </a> </div>
                <div> <a href="{{ route('home2') }}"> Products </a> </div>
                <div> <a href=""> Orders </a> </div>
                <div> <a href=""> Analytics </a> </div>
            </div>
            <div class="dropdown">
                <div class="user dropbtn"> <a href="profile.html"><img src="{{ asset('images/user.jpg') }}" width="35pixels" height="35pixels"></a> </div>
                <div class="dropdown-content">
                    <a href="{{ route('home1') }}">Home</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf    
                    </form>
                </div>
            </div>
        </div>

        <div class="title">
            <b> Update Shop Details </b>
        </div>

        <div class="container">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div><form method="post" action="/editshop">
                        {{ csrf_field() }}
            
                        <b>Description:</b><br>
                        <textarea name="desc" rows="5" cols="50"> {{ $shop->desc }}
                        </textarea>
                        <br><br>

                        <b>Operating Date and Time:</b><br>
                        <div class="kotak">Monday-Thursday: <input type="text" name="monThu" value="{{ $shop->monThu }}"><br></div>
                        <div class="kotak">Friday: <textarea name="friday"> {{ $shop->friday }} </textarea></div>
                        <div class="kotak">Saturday: <input type="text" name="saturday" value="{{ $shop->saturday }}"><br></div>
                        <div class="kotak">Location: <textarea name="location"> {{ $shop->location }} </textarea></div>
                        <br><br>

                        <b>Contact Us:</b><br>
                        <div class="kotak">Phone Number: <input type="text" name="phoneNum" value="{{ $shop->phoneNum }}"><br></div>
                        <div class="kotak">Fax: <input type="text" name="fax" value="{{ $shop->fax }}"></div>
                        <br><br>

                        <div class="submitButton"><button type="submit"> Update Details </button></div>
                    </form>
                </div>
        </div>

    </body>

</html>
