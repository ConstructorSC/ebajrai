<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;


class AdminAddProductComponent extends Component
{
    use WithFileUploads;

    public $nama;
    public $slug;
    public $description;
    public $packing;
    public $price;
    public $stock_status;
    public $quantity;
    public $image;
    public $category_id;

    public function mount()
    {
        $this->stock_status = 'instock';
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->nama, '-');
    }

    public function addProduct()
    {
        $product = new Product();
        $product->name = $this->nama;
        $product->slug = $this->slug;
        $product->description = $this->description;
        $product->packing = $this->packing;
        $product->price = $this->price;
        $product->stock_status = $this->stock_status;
        $product->quantity = $this->quantity;
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('products', $imageName);
        $product->image = $imageName;
        $product->category_id = $this->category_id;
        $product->save();

        session()->flash('message', 'Product has been created succesfully!');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-add-product-component', ['categories'=>$categories])->layout('livewire\admin\admin-dashboard-component');
    }
}
