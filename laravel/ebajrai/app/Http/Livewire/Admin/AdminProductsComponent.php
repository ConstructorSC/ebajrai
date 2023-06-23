<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AdminProductsComponent extends Component
{
    use WithPagination;
    public $products;

    public function mount()
    {
        $this->getProductsFromApi();
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-products-component', ['products' => $this->products, 'categories' => $categories])
            ->layout('livewire\admin\admin-dashboard-component');
    }

    public function getProductsFromApi()
    {
        $request = Request::create('/api/products', 'GET');
        $response = Route::dispatch($request);
        $this->products = json_decode($response->getContent());
    }
}
