<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Cart;

class CategoryComponent extends Component
{
    public $category_slug;

    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }

    use WithPagination;
    public function render()
    {
        $category = Category::where('slug', $this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;
        $products = Product::where('category_id', $category_id)->paginate(16);
        $categories = Category::all();
        if(!Auth::user())
        {
            return view('livewire.category-component', ['products'=>$products, 'categories'=>$categories, 'category_name'=>$category_name])->layout('layouts.base');
        }
        if(Auth::user()->utype === 'ADM')
        {
            return view('livewire.category-component', ['products'=>$products, 'categories'=>$categories, 'category_name'=>$category_name])->layout('livewire\admin\admin-dashboard-component');
        }
        return view('livewire.category-component', ['products'=>$products, 'categories'=>$categories, 'category_name'=>$category_name])->layout('layouts.base');
    }
}
