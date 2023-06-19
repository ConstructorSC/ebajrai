<!DOCTYPE html>
    <html> 
    <head>
        <title> E-Bajrai Mini Market | Search Item </title>
        <style>
            footer
            {
                position: relative;
            }
        </style> 
    </head>
    <body>

    <div class="title">
                <b> Result... </b>
            </div>
            
            <div class="content">
                
                <div class="left_content"> 
                    
                    <b> Category </b> <br>
                    <ul>
                    @foreach ($categories as $category) 
                        <li> <a href="{{ route('product.category',['category_slug'=>$category->slug]) }}" style="color: #268147"> {{ $category->name }} </a> </li>
                    @endforeach
                    </ul>

                    @livewire('header-search-component')

                    

                </div>
                
                @if($products->count()>0)
                
                <div class="right_content">
                    @foreach ($products as $product) 
                    
                    <div class="item">
                        <img src="{{ asset('images') }}/{{ $product->image }}" style="width: 170px; height: 170px" class="center">
                        <b> {{ $product->name }} </b> <br>
                        <a href="{{route('product.details',['slug'=>$product->slug])}}" style="font-size: 12px; color: #268147"> Description </a> <br>
                        <div style="color: #268147; text-align: center"> RM {{ $product->price }} </div>
                        <form class="item_input"> 
                            <input type="number" name="chicken" size="5" value="1" class="quantity">
                            <button name="add" onclick="addedtocart()"> Add </button>
                        </form>
                    </div>

                    @endforeach
                </div> 
                @else
                    <p style="padding-top:30px;">No Products </p>    
                @endif
            </div>
        </body>      
    </html>