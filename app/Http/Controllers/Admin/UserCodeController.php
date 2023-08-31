<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserCode;
use Illuminate\Http\Request;

class UserCodeController extends Controller
{
    public function index()
    {
        $data = UserCode::whereBelongsTo('subscription')->with(['subscription','promo_code'])->latest()->get();
        return view('admin.user-codes.index',compact('data'));
    }
}
