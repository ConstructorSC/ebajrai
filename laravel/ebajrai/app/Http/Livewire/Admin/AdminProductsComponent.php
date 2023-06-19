<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class AdminProductsComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $products = Product::paginate(20);
        $categories = Category::all();
        return view('livewire.admin.admin-products-component', ['products'=>$products, 'categories'=>$categories])->layout('livewire\admin\admin-dashboard-component');
    }
}
