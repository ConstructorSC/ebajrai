<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Livewire\Component;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use Illuminate\Support\Facades\DB;

class AdminEditProduct extends Controller
{
    private $productModel;
    private $db;

    public function __construct(Product $productModel, DB $db)
    {
        $this->productModel = $productModel;
        $this->db = $db;
    }

    function getProducts() {
        $products = $this->productModel->all();
        return response()->json($products);
    }

    function addForm()
    {
        return view('edit.addproduct');
    }

    // function addProduct(Request $request)
    // {
    //     $product = new Product();

    //     $product->name = $request->input('nama');
    //     $product->slug = $request->input('slug'); 
    //     $product->description = $request->input('description'); 
    //     $product->packing = $request->input('packing'); 
    //     $product->price = $request->input('price'); 
    //     $product->stock_status = $request->input('stock_status'); 
    //     $product->quantity = $request->input('quantity'); 
    //     $product->category_id = $request->input('category_id');
    //     $product->productPlacement = $request->input('productPlacement');
        
    //     if ($request->hasfile('image'))
    //     {
    //         $file = $request->file('image');
    //         $extension = $file->getClientOriginalExtension();
    //         $filename = time() . '.' . $extension;
    //         $file->move('images/', $filename);
    //         $product->image = $filename;
    //     } 
    //     else
    //     {
    //         return $request;
    //         $product->image = '';
    //     }

    //     $product->save();
    //     return redirect('/admin/addproduct')->with('message', 'Product has been created succesfully!');
    // }

    function addProduct(Request $request)
    {
        $product = $this->createProduct($request);
        $this->uploadProductImage($product, $request);
        $product->save();
        
        return redirect('/admin/addproduct')->with('message', 'Product has been created successfully!');
    }

    private function createProduct(Request $request)
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
        $product->productPlacement = $request->input('productPlacement');
        
        return $product;
    }

    private function uploadProductImage(Product $product, Request $request)
    {
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
            $product->image = '';
        }
    }

    function editForm($id)
    {
        $product = DB::select('select * from products where id = ?', [$id]);
        return view('edit.editproduct', ['product'=>$product]);
    }

    function editProduct(Request $request, $id)
    {
        $name = $request->input('nama');
        $description = $request->input('description'); 
        $packing = $request->input('packing'); 
        $price = $request->input('price'); 
        $stock_status = $request->input('stock_status'); 
        $quantity = $request->input('quantity'); 
        $category_id = $request->input('category_id');
        $productPlacement = $request->input('productPlacement');

        if ($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            $image = $filename;
        }
        else
        {
            $product = DB::select('select * from products where id = ?', [$id]);
            $image = $product[0]->image;
        }

        DB::update('update products set name=?,description=?,packing=?,price=?,stock_status=?,quantity=?,image=?,category_id=?,productPlacement=? where id=?', [$name,$description,$packing,$price,$stock_status,$quantity,$image,$category_id,$productPlacement,$id]);

        return redirect()->back()->with('message', 'Product has been updated succesfully!');
    }

    function deleteProduct($slug)
    {
        $saved = DB::delete('delete from products where slug=?', [$slug]);
        if($saved)
        {
            return response()->json(['message' => 'Product has been deleted succesfully!']);
        }
        else
        {
            return response()->json(['message' => 'Product has not been deleted succesfully!']);
        }
    }
}
