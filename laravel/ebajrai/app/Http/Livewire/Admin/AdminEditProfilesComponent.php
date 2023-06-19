<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminEditProfilesComponent extends Component
{
    public $decs;
    public $monThu;
    public $friday;
    public $saturday;
    public $location;
    public $phoneNum;
    public $fax;

    public function mount()
    {
        $admin = Admin::find(Auth::admin()->id);
        $this->decs = $admin->desc;
        $this->monThu = $admin->monThu;
        $this->friday = $admin->friday;
        $this->saturday = $admin->saturday;
        $this->location = $admin->location;
        $this->phoneNum = $admin->phoneNum;
        $this->fax = $admin->fax;
    }

    public function updateProfile() 
    {
        $admin = Admin::find(Auth::admin()->id);
        $admin->desc = this->desc;
        $admin->monThu = this->monThu;
        $admin->friday = this->friday;
        $admin->saturday = this->saturday;
        $admin->location = this->location;
        $admin->phoneNum = this->phoneNum;
        $admin->fax = this->fax;
        $admin->save();

        session()->flash('message', 'Shop Details has been updated successfully');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-profiles-component')->layout('livewire\admin\admin-edit-profiles-component');
    }
}