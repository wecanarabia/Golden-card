<?php

namespace App\Http\Controllers\Admin;

use App\Models\Offer;
use App\Models\Service;
use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VoucherController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('all-services')) {
            $data = Voucher::with(['user','offer','branch'])->latest()->paginate(10);
        }elseif(Auth::user()->can('services')){
            $services = Service::where('admin_id',Auth::user()->id)->latest()->get();
            $offers = Offer::latest()->with('service')->paginate(10);
            $data = Voucher::latest()->orderBy('offer_id')->with(['user','offer','branch'])->whereBelongsTo($offers)->paginate(10);
    }
        return view('admin.vouchers.index',compact('data'));
    }
}
