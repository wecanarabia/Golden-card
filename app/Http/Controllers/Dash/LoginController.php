<?php

namespace App\Http\Controllers\Dash;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dash\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin(){
        return view('dash.login');
    }
    public function postLogin(LoginRequest $request){

     $remember_me = $request->has('remember_me') ? true : false;
     if (auth()->guard('service')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')],$remember_me)||auth()->guard('service_admin')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')],$remember_me)){
         return redirect()->route('dash.home');
     }
     return redirect()->back()->withInput()->with(['error'=>__('Invalid credintials')]);
    }

    public function logout(){
        $guard=$this->getGuard();
        $guard->logout();
        return redirect()->route("dash.login-page");
    }

    public function getGuard(){
        $guard = Auth::guard()->name;
        if (in_array($guard,['service','service_admin'])) {
            return auth( $guard);
        }
    }
}
