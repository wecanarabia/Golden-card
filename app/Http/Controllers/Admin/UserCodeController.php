<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserCode;
use Illuminate\Http\Request;

class UserCodeController extends Controller
{
    public function index()
    {
        $data = UserCode::with(['subscription','promo_code'])->latest()->paginate(10);
        return view('admin.user-codes.index',compact('data'));
    }
}
