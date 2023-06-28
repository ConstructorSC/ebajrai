<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Cart;

class DetailsController extends Controller
{
    public function store()
    {
        $productId = request('product_id');
        $productName = request('product_name');
        $productPrice = request('product_price');

        Cart::add($productId, $productName, 1, $productPrice)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');

        return redirect()->route('product.cart');
    }

    public function render($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $categories = Category::all();

        if (!Auth::user()) {
            return view('details-component', compact('product', 'categories'))->layout('layouts.base');
        }

        if (Auth::user()->utype === 'ADM') {
            return view('details-component', compact('product', 'categories'))->layout('livewire\admin\admin-dashboard-component');
        }

        return view('details-component', compact('product', 'categories'))->layout('layouts.base');
    }
}
