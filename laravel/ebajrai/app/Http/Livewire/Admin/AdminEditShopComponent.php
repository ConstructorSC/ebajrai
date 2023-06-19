<?php

namespace App\Http\Livewire\Admin;

use App\Models\Shop;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditShopComponent extends Component
{
    public $id=1;
    public $decs;
    public $monThu;
    public $friday;
    public $saturday;
    public $location;
    public $phoneNum;
    public $fax;

    public function mount()
    {
        $shop = Shop::where('slug', $shop_slug)->first();
        $this->desc = $shop->desc;
        $this->monThu = $shop->monThu;
        $this->friday = $shop->friday;
        $this->saturday = $shop->saturday;
        $this->location = $shop->location;
        $this->phoneNum = $shop->phoneNum;
        $this->fax = $shop->fax;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->desc, '-');
    }

    public function updateShop() 
    {

        $shop = Shop::find($this->id); 

        $shop->desc = this->desc;
        $shop->monThu = this->monThu;
        $shop->friday = this->friday;
        $shop->saturday = this->saturday;
        $shop->location = this->location;
        $shop->phoneNum = this->phoneNum;
        $shop->fax = this->fax;
        $shop->save();

        session()->flash('message', 'Shop Details has been updated successfully');
    }

    public function render()
    {
        $shop = Shop::all();
        return view('livewire.admin.admin-edit-shop-component', ['shop'=>$shop])->layout('livewire\admin\admin-dashboard-component');
    }
}