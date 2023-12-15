<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('admin.auth.log');
        
    }

    public function postlogin(LoginRequest $request){

        // $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['name' => $request->input("user"),
         'password' => $request->input("password")])){
           // notify()->success('تم الدخول بنجاح  ');
            return redirect()-> route('index.admin');
          
         }
       // notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
    }
}
