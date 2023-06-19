<!DOCTYPE html>

<html>

    <head>

        <title> About Us </title>

        <link rel="stylesheet" href="base_style.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/astyle.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

        <style>
          body {
            background-color: #F5F8F2;
            color: darkslategray;
            font-size: 15px;
          }
          .container{
            margin-top: 30px;
            width: 1200px;
            height: 550px;
            margin-left: auto;
            margin-right: auto;
            background-color: white;
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            grid-template-rows: repeat(5, 1fr);
            border-radius: 0.8em;
          }

          .pic {
            grid-column: 1/3;
            grid-row: 1/6;
            padding-left: 30px;
            padding-top: 15px;
          }
          .oper {
            grid-column: 3/6;
            grid-row: 2/4;
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 25px;
          }
          .desc {
            grid-column: 3/6;
            grid-row: 1/2;
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 15px;
          }
          .contact {
            grid-column: 3/6;
            grid-row: 4/6;
            padding-left: 10px;
            padding-right: 10px;
          }
          h3{
            color: #53B175;
            font-size: 20px
          }
          .btnsubmit button {
            background-color: #53B175;
            color: white;
            border: 2px solid #53B175;
            border-radius: 10px;
          }
          .btnsubmit{
            position: relative;
            padding: 10px;
            left: 400px;
          }
          .btn:hover{
            cursor: pointer;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
          }
        </style>

    </head>

    <body>

        <div class="title">
            <b> About Us </b>
        </div>
        @if(session()->has('message'))
            <div class="alert alert-success d-flex justify-content-center">
                {{ session()->get('message') }}
            </div>
          @endif
        <div class="container">
          <div class="pic">
            <h3>Our Shop:</h3>
            <img src="{{ asset('images/shop_pic.png') }}" alt="Our Shop" width="409px" height="174px">
            <br><br><br>
            <img src="{{ asset('images/shop_inside.png') }}" alt="Shop" width="409px" height="174px">
          </div>
          <div class="desc">
            <h3>Description:</h3>
            {{ $shop->desc }}
          </div>
          <div class="oper">
            <h3>Operating Date and Time:</h3>
            <b>Monday-Thursday: </b>{{ $shop->monThu }}.<br>
            <b>Friday: </b>{{ $shop->friday }}<br>
            <b>Saturday: </b>{{ $shop->saturday }}<br>
            <b>Location: </b>{{ $shop->location }}<br>
          </div>
          <div class="contact">
            <h3>Contact Us:</h3>
            <b>Phone Number: </b>{{ $shop->phoneNum }}<br>
            <b>Fax: </b>{{ $shop->fax }}<br>
          </div>

          @auth
          @if(Auth::user()->utype === 'ADM')
          <form action="/admin/editshop">
            <div class="btnsubmit"><button type="submit" class="btn">Update Shop Detail</button></div>
          </form>
          @endif
          @endauth
        </div>

    </body>

</html>

