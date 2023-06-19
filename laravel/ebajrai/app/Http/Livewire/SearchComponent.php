<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;

class SearchComponent extends Component
{
    public $sorting;
    public $pagessize;

    public $search;
    public $product_cat;
    public $product_cat_id;

    public function mount() 
    {
        $this->sorting = "default";
        $this->pagessize = 16;
        $this->fill(request()->only('search', 'product_cat', 'product_cat_id'));
    }

    public function store($id, $name, $price)
    {
        Cart::add($id, $name, 1, $price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added to Cart');
        return redirect()->route('product.cart');
    }

    use Withpagination;
    public function render()
    {
        if ($this->sorting=='price')
        {
            $products = Product::where('name', 'like', '%'.$this->search .'%')->where('category_id', 'like', '%'.$this->product_cat_id.'%')->orderBy('price', 'ASC')->paginate($this->pagessize);
        }
        else
        {
            $products = Product::where('name', 'like', '%'.$this->search .'%')->where('category_id', 'like', '%'.$this->product_cat_id.'%')->paginate($this->pagessize);
        }

        $categories = Category::all();
        return view('livewire.search-component', ['products'=> $products, 'categories'=>$categories])->layout('layouts.base');
    }
}