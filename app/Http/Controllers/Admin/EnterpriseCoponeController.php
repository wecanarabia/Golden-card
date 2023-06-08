<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EnterpriseCopone;
use App\Models\EnterpriseSubscription;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EnterpriseCoponeController extends Controller
{
    public function index()
    {
        $data = EnterpriseSubscription::whereDate('end_date','<=',Carbon::now()->today())->with('copones')->latest()->paginate(10);
        dd($data);
        return view('admin.enterprise-copones.index',compact('data'));
    }
}
