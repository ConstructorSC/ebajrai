<div class="title">
    <b> All Item </b>
</div>

<div class="content">
    
    <div class="left_content"> 
        
        
        
        <b> Category </b> <br>
        <ul>
        @foreach ($categories as $category) 
            <li> <a href="{{ route('product.category',['category_slug'=>$category->slug]) }}" style="color: #268147"> {{ $category->name }} </a> </li>
        @endforeach
        </ul>
        <br><div style="display: flex"><button class="btn" style="font-size: 15px"> <a href="{{ route('admin.add') }}">Add New Product</a> </button></div>
    
    </div>
    
    
    <div class="right_content" style="border: none"> 
        
        @foreach ($products as $product) 
            
            <div class="item">
                <img src="{{ asset('images') }}/{{ $product->image }}" style="width: 170px; height: 170px" class="center">
                <b> {{ $product->name }} </b> <br>
                <a href="{{route('product.details',['slug'=>$product->slug])}}" style="font-size: 12px; color: #268147"> Description </a> <br>
                <div style="color: #268147; text-align: center"> RM {{ $product->price }} </div>
                <div style="display: flex; justify-content: space-between">
                    <button> <a href="/admin/editproduct/{{ $product->id }}">Edit product</a> </button>
                    <button onclick="deleteProduct('{{$product->slug}}')" style="background-color:white;border:2px solid #53B175;color:darkslategray;">Delete product</button>
                </div>
            </div>

        @endforeach

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        function deleteProduct(slug){

            var value = confirm('Are you sure you want to delete this product?');

            if(!value){
                return false;
            }
            
            $.ajax({
                type: "DELETE",
                url: "/api/admin/deleteproduct/"+ slug,
                dataType: 'json',
                success: function (data) {
                    alert(data.message);
                    location.reload();
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                }
            });

        }
    </script>
</div>
