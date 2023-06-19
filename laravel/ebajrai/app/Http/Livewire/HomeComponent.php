<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Cart;

class HomeComponent extends Component
{
    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }
    
    use WithPagination;
    public function render()
    {
        $products = Product::paginate(20);
        $categories = Category::all();
        if(!Auth::user())
        {
            return view('livewire.home-component', ['products'=>$products, 'categories'=>$categories])->layout('layouts.base');
        }
        if(Auth::user()->utype === 'ADM')
        {
            return view('livewire.home-component', ['products'=>$products, 'categories'=>$categories])->layout('livewire\admin\admin-dashboard-component');
        }
        return view('livewire.home-component', ['products'=>$products, 'categories'=>$categories])->layout('layouts.base');
    }
}
