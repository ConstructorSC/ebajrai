<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Livewire\Component;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use DB;

class AdminEditShop extends Controller
{

    function editForm()
    {
        $shop = Shop::where('id', 1)->first();
        return view('edit.editshop', ['shop'=>$shop]);
    }

    function editShop(Request $request)
    {
        $shop = Shop::where('id', 1)->first();

        $shop->desc = $request->input('desc');
        $shop->monThu = $request->input('monThu');
        $shop->friday = $request->input('friday');
        $shop->saturday = $request->input('saturday');
        $shop->location = $request->input('location');
        $shop->phoneNum = $request->input('phoneNum');
        $shop->fax = $request->input('fax');
        
        $shop->save();
        return redirect('/aboutus')->with('message', 'Shop\'s About has been updated succesfully!');
    }
}
