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
                <div> <a href="{{ route('admin.about') }}"> About </a> </div>
                <div> <a href="{{ route('home2') }}"> Products </a> </div>
                <div> <a href=""> Orders </a> </div>
                <div> <a href=""> Analytics </a> </div>
            </div>
        </div>

        <div class="title">
            <b> Update Shop Details </b>
        </div>

        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>
            @endif
          <form class="editDetails" wire:submit.prevent="updateShop">
            <b>Description:</b><br>
            <textarea wire:model="desc" id="desc" rows="6" cols="80"  wire:keyup.live="generateSlug">
            </textarea>
            <br><br>

            <b>Operating Date and Time:</b><br>
            <div class="kotak">Monday-Thursday: <input type="text" wire:model="monThu"><br></div>
            <div class="kotak">Friday: <textarea wire:model="friday" rows="3" cols="40" value=""></textarea></div>
            <div class="kotak">Saturday: <input type="text" wire:model="saturday" value=""><br></div>
            <div class="kotak">Location: <textarea wire:model="location" rows="3" cols="40" value=""></textarea></div>
            <br><br>

            <b>Contact Us:</b><br>
            <div class="kotak">Phone Number: <input type="text" wire:model="phoneNum" value=""><br></div>
            <div class="kotak">Fax: <input type="text" wire:model="fax" value=""></div>
            <br><br>

            <div class="submitButton"><button type="submit"> Update Details </button></div>
          </form>
        </div>

    </body>

</html>
