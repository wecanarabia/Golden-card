<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Offer;
use App\Models\Service;
use App\Models\Voucher;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EnterpriseCopone;
use App\Models\PromoCode;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data['sub_earn'] = Subscription::where('plan_id','<>',4)->sum('value');
        $data['sub_period_earn'] = Subscription::where('plan_id','<>',4)->sum('value');
        $data['new_customer_count'] = User::count();
        $data['new_customer_period_count'] = User::count();
        $data['voucher_count'] = Voucher::count();
        $data['voucher_period_count'] = Voucher::count();
        $data['categories'] = Category::with(['subcategories'])->parent()->get();
        //used vouchers
        foreach ($data['categories'] as $category) {
            if (!empty($category->subcategories)) {
                $services= Service::whereStatus(1)->whereIn('category_id',$category->subcategories->pluck('id')->toArray())->get();
                if ($services->count()>0) {
                    $offers = Offer::whereStatus(1)->whereBelongsTo($services)->get();
                    if ($offers->count()>0) {
                        $category['vouchers'] = Voucher::whereBelongsTo($offers)->count();
                    }else {
                        $category['vouchers']=0;
                    }
                }else {
                    $category['vouchers']=0;
                }
            }

        }

        $data['subs'] = User::whereHas('subscription',function($q){
            $q->whereDate('end_date','>=',Carbon::now());
        })->get();



        dd($data['subs']);
        return view('admin.index',compact('data'));
    }
}

