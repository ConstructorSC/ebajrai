<?php

namespace App\Http\Livewire;


use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Cart;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        $product = Product::where('slug',$this->slug)->first();
        $categories = Category::all();
        if(!Auth::user())
        {
            return view('livewire.details-component',['product'=>$product], ['categories'=>$categories])->layout('layouts.base');
        }
        if(Auth::user()->utype === 'ADM')
        {
            return view('livewire.details-component',['product'=>$product], ['categories'=>$categories])->layout('livewire\admin\admin-dashboard-component');
        }
        return view('livewire.details-component',['product'=>$product], ['categories'=>$categories])->layout('layouts.base');
            
    }
}
