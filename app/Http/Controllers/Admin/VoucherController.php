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
            $data = Voucher::with(['user','offer','branch'])->latest()->get();
        }elseif(Auth::user()->can('services')){
            $services = Service::where('admin_id',Auth::user()->id)->latest()->get();
            $offers = Offer::latest()->whereBelongsTo($services)->with('service')->get();
            $data = Voucher::latest()->orderBy('offer_id')->with(['user','offer','branch'])->whereBelongsTo($offers)->get();
    }
        return view('admin.vouchers.index',compact('data'));
    }
}
