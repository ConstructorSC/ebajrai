<!DOCTYPE html>

<html>
    
    <head>
        
        <title> Add Product </title>

        <link rel="stylesheet" href="{{ asset('css/base_style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/shop_style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/astyle.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        
        <style>

            body {
                background-color: #F5F8F2;
                height: 100%;
            }    
                    
            .container {
                display: flex;
                justify-content: center;
            }
            
            .user_card {
                height: 800px;
                width: 700px;
                padding: 0 80px 0 80px;
            }
            
            .bahagi {
                display: grid;
                grid-template-columns: 150px 350px;
                grid-template-rows: 40px 40px 40px 40px 40px 40px 40px;
                grid-row-gap: 15px;
            }

            input, textarea {
                border: 1px solid darkgray;
                border-radius: 3px;
                height: 30px;
                width: 350px;
            }
            
            button {
                background-color: #53B175;
                color: white;
                border: 2px solid #53B175;
                width: 40%;
                height: 35px;
                border-radius: 10px;
                font-size: 15px;
            }

            a:hover {color: white;}
            
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
            <b> Add Product</b>
        </div><br><br>
        
        <div class="container">
            <div class="user_card">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div><form method="post" action="{{ route('addproduct') }}" enctype="multipart/form-data">
                    @csrf
                <h2 style="text-align: center"> Add New Product </h2> <br>
                    <div class="bahagi">

                        <div> <label>Product name</label> </div>
                        <div> <input type="text" name="nama"> </div>

                        <div> <label>Product slug</label> </div>
                        <div> <input type="text" name="slug"> </div>

                        <div> <label>Description</label> </div> 
                        <div> <textarea name="description"> </textarea> </div>

                        <div> <label>Packing Size</label> </div> 
                        <div> <textarea name="packing"> </textarea> </div>

                        <div> <label>Price</label> </div>
                        <div> <input type="text" name="price"> </div>

                        <div> <label>Stock Status</label> </div> 
                        <div> <select name="stock_status"> 
                                <option value="instock"> InStock </option>
                                <option value="outofstock"> OutOfStock </option>
                        </select> </div>

                        <div> <label>Stock Quantity</label> </div> 
                        <div> <input type="text" name="quantity"> </div>

                        <div> <label>Product Image</label> </div>
                        <div> <input type="file" style="background-color: white; border: none" name="image">
                        </div>
                        
                        <div> <label>Category</label> </div>
                        <div> <select name="category_id">
                            <option value="1"> Fruits and Vegetables </option>
                            <option value="2"> Dairy and Egg </option>
                            <option value="3"> Meat and Fish </option>
                            <option value="4"> Beverage </option>
                        </select> </div>

                        <div> <label>Product Placement</label> </div> 
                        <div> <input type="text" name="productPlacement"> </div>

                    </div>
                <br><br>
                <div style="display: flex; justify-content: flex-end"><button type="submit"> Add Product </button></div>
                </form></div>
            </div>
        </div>
    </body>

</html>