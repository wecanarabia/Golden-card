<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function service()
    {
        if (Auth::guard()->name=='service') {
            return Auth::user()->id;
        }else if (Auth::guard()->name=='service_admin') {
            return Auth::user()->service_id;
        }
    }
}
