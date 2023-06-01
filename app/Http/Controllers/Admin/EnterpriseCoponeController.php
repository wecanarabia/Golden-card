<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EnterpriseCopone;
use Illuminate\Http\Request;

class EnterpriseCoponeController extends Controller
{
    public function index()
    {
        $data = EnterpriseCopone::with(['enterprise','user'])->latest()->paginate(20);
        return view('admin.enterprise-copones.index',compact('data'));
    }
}
