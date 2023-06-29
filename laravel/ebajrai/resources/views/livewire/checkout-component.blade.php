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

            .base {
                background-color: white;
                padding: 20px 0px 20px 50px;
                margin: auto;
                border: 1px solid #E5E4E2;
                border-radius: 0.8em 0.8em 0.8em 0.8em;
                line-height: 2.0;
            }

            .kotak {
                display: grid;
                width: 1100px;
                grid-template-columns: 550px 550px;
                grid-template-rows: 1fr 1fr;
                margin: auto;
            }

            .kotak1 {
                background-color: #f5f4f2;
                width: 85%;
                padding: 8px 10px 10px 10px;
                border: 1px solid gainsboro;
                border-radius: 0.5em;
            }

            .paymenthod {
                width: 460px;
                background-color: white;
                margin: auto;
                border: 1px solid #E5E4E2;
                border-radius: 0 0 0.8em 0.8em;
                padding: 20px 20px 20px 20px;
                line-height: 2.0;
            }

            .atas {
                border-bottom: none;
                border-radius: 0.8em 0.8em 0 0;
                font-size: 18px;
                font-weight: bold;
            }

            button {
                background-color: #53B175;
                color: white;
                border: 2px solid white;
                width: 420px;
                height: 50px;
                font-size: 15px;
                border-radius: 5px;
            }

            a:hover{
                text-decoration: none;
                color: white;
            }

            .container {
                display: flex;
                justify-content: center;
            }

            .user_card{
                height: 600px;
                width: 1100px;
                padding: 20px 80px 20px 80px;
                background-color: white;
                border-radius: 5px;
            }

            .bahagi {
                border: 3px solid #fff;
            }

            .besar{
                height: 60px;
                overflow: auto;
            }

            .bahagi1{
                width: 50%;
                float: left;
                padding: 20px;
            }

            .detail{
                padding-top: 15px;
            }

            .btn:hover {text-decoration: underline;}
            .bawah {border-radius: 0 0 0.8em 0.8em}
            .option { width: 460px; }
            .kotakinput{ border: 1px solid #e5e4e2;}

        </style>
    </head>

    <body>

        <script src="https://www.paypal.com/sdk/js?client-id=Adi4zh4W6NoQb5-3IZJIouPvE96lHshtseUhmUxKH5QvrpaRJM6H0lzzHTZsiB4KqmLsjSnzb5ysKS37&currency=USD"></script>

        <div class="title">
            <b> Checkout </b>
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

        <div class="cart">

            @foreach (Cart::content() as $item)
                <div style='text-align:left;'> <img src="{{ asset('images') }}/{{ $item->model->image }}" width='80pixels' height='80pixels' valign='middle' alt="{{ $item->model->name }}"> &emsp;&emsp;&emsp; {{ $item->model->name }} </div>
                <div style='padding-top:30px;'> RM {{ $item->model->price }} </div>
                <div style='padding-top:30px;'>
                    {{$item->qty}}
                </div>
                <div style='padding-top:30px;'> RM {{ $item->subtotal }} </div>
                <br>
            @endforeach

        </div> <br>

        <div class="cart">
            <div></div><div></div>
            <div style="grid-column: 4/5"> <b style="font-size: 18px;">Total : </b>RM {{Cart::subtotal()}} </div>
            {{-- @if (Session::has('checkout'))
                <div style="grid-column: 4/5"> <b style="font-size: 18px;">Total : </b>RM {{Session::get('checkout')['total']}} </div>
            @else
                <div style="grid-column: 4/5"> <b style="font-size: 18px;">Total : </b>RM tok tubik </div>
            @endif --}}
        </div><br>

        <form action="submitOrder" method="POST">
        <div class="container">
            <div class="user_card">
                <h1 style="text-align: center"> Shipping Details </h1>
                <hr class="mb-3">
                <div class="bahagi">
                    <div class="bahagi1">
                        <div class="detail"> First Name </div>
                        <input type="text" class="form-control" name="firstname" placeholder="Your first name" required/>
                        @error('firstname') <span class="text-danger">{{ $message }}</span> @enderror
                        <div class="detail"> Email </div>
                        <input type="text" class="form-control" name="email" placeholder="Your email address" required/>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        <div class="detail"> Address </div>
                        <input type="text" class="form-control" name="line1" placeholder="Street / Apartment number" required/>
                        @error('line1') <span class="text-danger">{{ $message }}</span> @enderror
                        <div class="detail"> State </div>
                        <input type="text" class="form-control" name="state" placeholder="State" required/>
                        @error('state') <span class="text-danger">{{ $message }}</span> @enderror
                        <div class="detail"> Zipcode </div>
                        <input type="text" class="form-control" name="zipcode" placeholder="Zipcode" required/>
                        @error('zipcode') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                        <div class="bahagi1">
                        <div class="detail"> Last name </div>
                        <input type="text" class="form-control" name="lastname" placeholder="Your last name" required/>
                        @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
                        <div class="detail"> Mobile </div>
                        <input type="text" class="form-control" name="mobile" placeholder="Your phone number" required/>
                        @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
                        <div class="detail"> City </div>
                        <input type="text" class="form-control" name="city" placeholder="City" required/>
                        @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                        <div class="detail"> Country </div>
                        <input type="text" class="form-control" name="country" placeholder="Country" required/>
                        @error('country') <span class="text-danger">{{ $message }}</span> @enderror

                    </div>
                    <br><br><br>
                </div>
            </div>
        </div>
        <br><br>

        <div class="kotak">
        {{-- <div>
            <div class="base atas option"> Payment Method </div>

            <div class="paymenthod">
                <div class="satu"> Please choose your payment method : <br></div>
                <div>
                    <input type="radio" name="paymentmode" id="payment-method-bank" value="cod">   Cash on Delivery
                    <img src="images/cash.jpg" width="170pixels">
                </div>
                <div>
                <img src="images/o9.jpg" width="170pixels"> <br>

                <input type="radio" name="paymentmode" id="payment-method-visa" value="card"> Debit / Credit Card <br>
                <input type="radio" name="paymentmode" id="payment-method-paypal" value="paypal"> Paypal <br>
                <br>
                </div>
                @error('paymentmode') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

        </div> --}}

        <div>
            <div class="base atas option"> Delivery Method </div>

            <div class="paymenthod">
                <div class="satu"> Please choose your delivery method : </div>
                <div>
                    <input type="radio" name="del" value="pickup">
                    <img src="images/pickup.jpg" width="170pixels">
                </div>
                <div>
                    <input type="radio" name="del" value="delivery">
                    <img src="images/delivery.jpg" width="170pixels">
                </div>
                {{-- <div style="padding: 33px 0px 0px 62px"> <input type="button" value="Confirm" class="btn"> </div> --}}
            </div>

        </div>
        <div>
            <div class="base atas option"> Payment Method </div>

            <div class="paymenthod">
                <div class="satu"> Please choose your payment method : <br><br></div>
                <div style="margin-bottom: 11px"><button> <a href="{{ route('acceptOrder') }}">Place Order | COD</a> </button> </div>
                <div id="paypal-button-container"></div>
            </div>

        </div>
        </div></form>

        <script src="script.js"></script>

    </body>

</html>
