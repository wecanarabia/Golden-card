<?php

namespace App\Http\Controllers\Dash;

use App\Models\Offer;
use App\Models\Branch;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Controllers\Controller;
use App\Models\ImageService;
use App\Models\Voucher;

class HomeController extends Controller
{
    protected $auth;
    public function __construct(AuthService $auth)
    {
        $this->auth=$auth;
    }
    public function index()
    {
        $service = Service::findOrFail($this->auth->service());
        $data['branches']=Branch::withCount('offers')->whereBelongsTo($service)->get();
        $data['images']=ImageService::where('service_id',$this->auth->service())->latest()->get();
        $data['offers']=Offer::whereBelongsTo($service)->latest()->get();
        $data['vouchers']=Voucher::whereIn('offer_id',$data['offers']->pluck('id'))->get();
        return view('dash.index',compact('data'));
    }
}
