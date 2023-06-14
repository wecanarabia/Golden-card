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
    }

    public function index()
    {
 
            $service = Service::findOrFail($this->auth->service());
            $offers = Offer::latest()->whereBelongsTo($service)->get();
            $data = Voucher::latest()->orderBy('offer_id')->with(['user','offer','branch'])->whereBelongsTo($offers)->paginate(10);
    
        return view('dash.vouchers.index',compact('data'));
    }
}
