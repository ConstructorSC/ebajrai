<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminAddProduct extends Controller
{
    function index()
    {
        return view('edit.addproduct');
    }

    function store(Request $request)
    {
        $product = new Product();

        $product->name = $request->input('nama');
        $product->slug = $request->input('slug'); 
        $product->description = $request->input('description'); 
        $product->packing = $request->input('packing'); 
        $product->price = $request->input('price'); 
        $product->stock_status = $request->input('stock_status'); 
        $product->quantity = $request->input('quantity'); 
        $product->category_id = $request->input('category_id');
        
        if ($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            $product->image = $filename;
        } 
        else
        {
            return $request;
            $product->image = '';
        }

        $product->save();
        return redirect()->back()->with('message', 'Product has been created succesfully!');
    }
}
