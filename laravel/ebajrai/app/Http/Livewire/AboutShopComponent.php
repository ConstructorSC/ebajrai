<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class AboutShopComponent extends Component
{
    public function render()
    {
        $shop = Shop::where('id', 1)->first();
        if(!Auth::user())
        {
            return view('livewire.about-shop-component',['shop'=>$shop])->layout('layouts.base');
        }
        if(Auth::user()->utype === 'ADM')
        {
            return view('livewire.about-shop-component',['shop'=>$shop])->layout('livewire\admin\admin-dashboard-component');
        }
        return view('livewire.about-shop-component',['shop'=>$shop])->layout('layouts.base');
    }
}
