<?php

namespace App\Http\Livewire\Admin;

use App\Models\Shop;
use Livewire\Component;
use Livewire\WithPagination;

class AdminShopComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $shop = Shop::paginate(20);
        return view('livewire.admin.admin-shop-component', ['shop'=>$shop])->layout('livewire\admin\admin-dashboard-component');
    }
}