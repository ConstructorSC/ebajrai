<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use DB;

class UserEditProfile extends Controller
{
    public function userEditForm($id)
    {
        if(!(Profile::where('user_id',Auth::user()->id)->first()))
        {
            $profile = new Profile();
            $profile->user_id = Auth::user()->id;
            $profile->save();
        }
        $user = User::find(Auth::user()->id);
        return view('edit.usereditprofile',['user'=>$user]);
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/profile/', $filename);
            $user->profile->image = $filename;
        }
        else
        {
            $user->profile->image = 'default.png';
        }
        
        $user->name = $request->input('name');
        $user->profile->phone = $request->input('phone');
        $user->profile->address = $request->input('address');

        $user->save();
        $user->profile->save();

        return redirect('/user/profile')->with('message', 'Profile has been updated');
    }

    public function deleteProfile($id)
    {
        User::destroy($id);

        return redirect('/')->with('message', 'Account has been deleted succesfully!');
    }
}
