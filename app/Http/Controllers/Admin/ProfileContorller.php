<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileContorller extends Controller
{
    public function profile()
    {
        return view('admin.profile.myprofile');
    }
    public function logout(){
        
       auth()->logout();
      
        return redirect()->route('getlogin');
    }
}
