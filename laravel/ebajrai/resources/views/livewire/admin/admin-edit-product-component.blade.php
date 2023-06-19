<!DOCTYPE html>

<html>
    
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    @livewireStyles
    @livewireScripts
</head>
    
<body>

<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">   
                        <div class="row">   
                            <div class="col-md-6"> 
                                Edit Product  
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert"> {{ Session::get('message') }} </div>
                    @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateProduct"> 
                            <div class="form-group"> 
                                <label class="col md-4 control-label"> Product Name </label>
                                <div class="col-md-4"> 
                                    <input type="text" class="form-control input-md" wire:model="name" wire:keyup.live="generateSlug">
                                </div>
                            </div>

                            <div class="form-group"> 
                                <label class="col md-4 control-label"> Product Slug </label>
                                <div class="col-md-4"> 
                                    <input type="text" class="form-control input-md" wire:model="slug">
                                </div>
                            </div>

                            <div class="form-group"> 
                                <label class="col md-4 control-label"> Description </label>
                                <div class="col-md-4"> 
                                    <textarea class="form-control" wire:model="description"> </textarea>
                                </div>
                            </div>

                            <div class="form-group"> 
                                <label class="col md-4 control-label"> Packing Size </label>
                                <div class="col-md-4"> 
                                <textarea class="form-control" wire:model="packing"> </textarea>
                                </div>
                            </div>

                            <div class="form-group"> 
                                <label class="col md-4 control-label"> Price </label>
                                <div class="col-md-4"> 
                                    <input type="text" class="form-control input-md" wire:model="price">
                                </div>
                            </div>

                            <div class="form-group"> 
                                <label class="col md-4 control-label"> Stock Status </label>
                                <div class="col-md-4"> 
                                    <select class="form-control" wire:model="stock_status"> 
                                        <option value="instock"> InStock </option>
                                        <option value="outofstock"> OutOfStock </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group"> 
                                <label class="col md-4 control-label"> Quantity </label>
                                <div class="col-md-4"> 
                                    <input type="text" class="form-control input-md" wire:model="quantity">
                                </div>
                            </div>

                            <div class="form-group"> 
                                <label class="col md-4 control-label"> Product Image </label>
                                <div class="col-md-4"> 
                                    <input type="file" class="input-file" wire:model="newimage">
                                    @if($newimage)
                                        <img src="{{ $newimage->temporaryUrl() }}" width="120" />
                                    @else
                                        <img src="{{ asset('images') }}/{{$image}}" width="120" />
                                    @endif
                                </div>
                            </div>

                            <div class="form-group"> 
                                <label class="col md-4 control-label"> Category </label>
                                <div class="col-md-4"> 
                                    <select class=form-control wire:model="category_id"> 
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                        @endforeach 
                                    </select> 
                                </div>
                            </div>

                            <div class="form-group"> 
                                <label class="col md-4 control-label"></label>
                                <div class="col-md-4"> 
                                    <button type="submit" class="btn btn-primary"> Update </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
