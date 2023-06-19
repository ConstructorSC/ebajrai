<!DOCTYPE html>

<html>
    
    <head>
        
        <title> Shopping Cart </title>
        
        <link rel="stylesheet" href="base_style.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" > 
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

        <style>
            
            body {
                background-color: #F5F8F2;
                color: darkslategray;
            }

            .cart {
                display: grid;
                grid-template-columns: 1fr 180px 180px 180px 140px;
                grid-template-rows: 1fr;
                width: 1100px;
                background-color: white;
                padding: 30px 30px 30px 50px;
                margin: auto;
                border: 1px solid #E5E4E2;
                border-radius: 0.8em 0.8em 0.8em 0.8em;
                grid-row-gap: 15px;
                text-align:center;
            }
            
            .atas {font-weight: bold; font-size: 18px;}

            button {
                background-color: #53B175;
                color: white;
                border: 2px solid white;
                width: 16%;
                height: 30px;
                border-radius: 50%;
            }
        
        </style>
    
    </head>
    
    <body>
        
        <div class="title">
            <b> My Shopping Cart </b>
        </div>
        
        <br><br>

        @if(Session::has('success_message'))
            <div class="alert alert-success d-flex justify-content-center">
                {{Session::get('success_message')}}
            </div>
        @endif

        <div class="cart atas">
            <div> Product </div>
            <div> Unit Price </div>
            <div> Quantity </div>
            <div> Total Price </div>
        </div> <br>

        @if(Cart::count() > 0)
        <div class="cart">

            @foreach (Cart::content() as $item)   
                <div style='text-align:left;'> <img src="{{ asset('images') }}/{{ $item->model->image }}" width='80pixels' height='80pixels' valign='middle' alt="{{ $item->model->name }}"> &emsp;&emsp;&emsp; {{ $item->model->name }} </div>
                <div style='padding-top:30px;'> RM {{ $item->model->price }} </div>
                <div style='padding-top:30px;'>
                    <button style="background-color: black; color: white;" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')">-</button>
                    {{$item->qty}}
                    <button style="background-color: #53B175; color: white;" wire:click.prevent="increaseQuantity('{{$item->rowId}}')">+</button> 									
                </div>
                <div style='padding-top:30px;'> RM {{ $item->subtotal }} </div>    
                <div style='padding-top:30px;'> <a href='#' style="border-radius:25%; background-color: #53B175; padding: 12px 18px 12px 18px" wire:click.prevent="destroy('{{$item->rowId}}')"> Delete </a> </div>
            @endforeach

        </div> <br>     

        <div class="cart">
            <div></div><div></div>
            <div> <b style="font-size: 18px;">Total : </b>RM {{Cart::subtotal()}} </div>
            <div style="grid-column: 4/6"> <a href="#" wire:click.prevent="setAmountForCheckout()" style="background-color: #53B175; padding: 12px 90px 12px 90px"> Check out </a> </div>
        </div>
        @else
            <h1 style="text-align:center; color:red">No item in cart</h1>
            <div style='padding-top:30px; display:flex; justify-content:center;'><a href="{{ route('home1') }}" style="border-radius:10%; background-color: #53B175; padding: 12px 18px 12px 18px">Shop Now!</a></div>
        @endif
    </body>

</html>