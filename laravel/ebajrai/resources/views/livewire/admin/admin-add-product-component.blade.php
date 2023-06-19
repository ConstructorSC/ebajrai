<!DOCTYPE html>

<html>
    
    <head>
        
        <title> Add Product </title>
        
        <style>
            
            .container {
                display: flex;
                justify-content: center;
            }
            
            .user_card {
                height: 700px;
                width: 500px;
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
                background-color: #fafafa;
            }
            
            button {
                background-color: #53B175;
                color: white;
                border: 2px solid #53B175;
                width: 40%;
                height: 35px;
                border-radius: 10px;
                font-family: Times New Roman;
                font-size: 15px;
            }
            
        </style>
        @livewireStyles
        @livewireScripts
    </head>
    
    <body>
          
        <div class="title">
            <b> Add Product </b>
        </div><br><br>
        
        <div class="container">
            <div class="user_card">
                @if(Session::has('message'))
                    <div role="alert"> {{ Session::get('message') }} </div>
                @endif
                <div><form enctype="multipart/form-data" wire:submit.prevent="addProduct">
                <h2 style="text-align: center"> Add New Product </h2> <br>
                    <div class="bahagi">

                        <div> <label>Product name</label> </div>
                        <div> <input type="text" wire:model="nama" wire:keyup.live="generateSlug"> </div>

                        <div> <label>Product slug</label> </div>
                        <div> <input type="text" wire:model="slug"> </div>

                        <div> <label>Description</label> </div> 
                        <div> <textarea wire:model="description"> </textarea> </div>

                        <div> <label>Packing Size</label> </div> 
                        <div> <textarea wire:model="packing"> </textarea> </div>

                        <div> <label>Price</label> </div>
                        <div> <input type="text" wire:model="price"> </div>

                        <div> <label>Stock Status</label> </div> 
                        <div> <select wire:model="stock_status"> 
                                <option value="instock"> InStock </option>
                                <option value="outofstock"> OutOfStock </option>
                        </select> </div>

                        <div> <label>Stock Quantity</label> </div> 
                        <div> <input type="text" wire:model="quantity"> </div>

                        <div> <label>Product Image</label> </div>
                        <div> <input type="file" style="background-color: white; border: none" wire:model="image"> 
                              @if($image)
                                <img src="{{ $image->temporaryUrl() }}" width="120" />
                              @endif
                        </div>
                        
                        <div> <label>Category</label> </div>
                        <div> <select wire:model="category_id"> @foreach($categories as $category)
                                <option value="{{ $category->id }}"> {{ $category->name }} </option>
                        @endforeach </select> </div>

                    </div>
                <br><br>
                <div style="display: flex; justify-content: flex-end"><button type="submit"> Add Product </button></div>
                </form></div>
            </div>
        </div>
    </body>

</html>
