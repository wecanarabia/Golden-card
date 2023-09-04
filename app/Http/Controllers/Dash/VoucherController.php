<?php

namespace App\Http\Controllers\Dash;

use App\Models\Offer;
use App\Models\Service;
use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Controllers\Controller;

class VoucherController extends Controller
{
    protected $auth;
    public function __construct(AuthService $auth)
    {
        $this->auth=$auth;
        $this->middleware('can:view')->only(["index"]);
    }

    public function index()
    {

            $service = Service::findOrFail($this->auth->service());
            $offers = Offer::latest()->whereBelongsTo($service)->get();
            if ($offers->count()>0) {
                $data = Voucher::latest()->orderBy('offer_id')->with(['user','offer','branch'])->whereBelongsTo($offers)->get();
            }else{
                $data=([]);
            }
        return view('dash.vouchers.index',compact('data'));
    }
}
