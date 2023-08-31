<?php

namespace App\Http\Controllers\Dash;

use Carbon\Carbon;
use App\Models\Offer;
use App\Models\Branch;
use App\Models\Service;
use App\Models\Voucher;
use App\Models\ImageService;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $auth;
    public function __construct(AuthService $auth)
    {
        $this->auth=$auth;
    }
    public function index($period=null)
    {
        if (Auth::user()->can('view')||Auth::user()->can('control')) {
        if ($period=='') {
            $date = Carbon::now();
        }elseif ($period == 'week') {
            $date = Carbon::now()->subWeek();
        }elseif ($period == 'month') {
            $date = Carbon::now()->subMonth();
        }elseif ($period == 'year') {
            $date = Carbon::now()->subYear();
        }
        $service = Service::findOrFail($this->auth->service());
        $data['branches']=Branch::whereBelongsTo($service);
        $data['offers']=Offer::whereBelongsTo($service)->get();
        $data['active_offers']=Offer::whereStatus(1)->whereBelongsTo($service)->get();
        $data['popular_offers']=Offer::withCount('vouchers')->whereBelongsTo($service)->orderBy('vouchers_count')->limit(10)->get();
        $data['vouchers_count']=Voucher::whereDate('created_at','>=',$date)->whereIn('offer_id',$data['offers']->pluck('id'))->get()??collect([]);
        $data['vouchers']=Voucher::whereIn('offer_id',$data['offers']->pluck('id'))->latest()->limit(5)->get();
        $data['saving_value'] = 0;
        if ($data['vouchers_count']) {
            foreach ($data['vouchers_count'] as $voucher) {
                $data['saving_value']+=$voucher?->offer?->discount_value;
            }
        }else{
            $data['saving_value'];
        }

        return view('dash.index',compact('data','service'));
    }else{
        return view('dash.index');
    }
    }
}
