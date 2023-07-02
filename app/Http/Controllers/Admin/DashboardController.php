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
use App\Models\EnterpriseSubscription;
use App\Models\PromoCode;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index($period=null)
    {
        if ($period==null) {
            $date = Carbon::now();
        }elseif ($period == 'week') {
            $date = Carbon::now()->subWeek();
        }elseif ($period == 'month') {
            $date = Carbon::now()->subMonth();
        }elseif ($period == 'year') {
            $date = Carbon::now()->subYear();
        }
        $data['sub_earn'] = Subscription::where('plan_id','<>',4)->sum('value');
        $data['sub_period_earn'] = Subscription::whereDate('start_date','>=',$date)->whereDate('end_date','>=',Carbon::now())->where('plan_id','<>',4)->sum('value');
        $data['new_customer_count'] = User::count();
        $data['new_customer_period_count'] = User::whereDate('created_at','>=',$date)->count();
        $data['voucher_count'] = Voucher::count();
        $data['voucher_period_count'] = Voucher::whereDate('created_at','>=',$date)->count();
        $data['categories'] = Category::with(['subcategories'])->parent()->get();
        //used vouchers
        foreach ($data['categories'] as $category) {
            if (!empty($category->subcategories)) {
                $services= Service::whereStatus(1)->whereIn('category_id',$category->subcategories->pluck('id')->toArray())->get();
                $category['services_count']=Service::whereStatus(1)->whereIn('category_id',$category->subcategories->pluck('id')->toArray())->count();
                $category['services_period_count']=Service::whereDate('created_at','>=',$date)->whereStatus(1)->whereIn('category_id',$category->subcategories->pluck('id')->toArray())->count();
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

        $data['user_subs'] = User::whereHas('subscription',function($q){
            $q->whereDate('end_date','>=',Carbon::now());
        })->get();

        $data['promo_code_sub'] = Subscription::whereIn('user_id',$data['user_subs']->pluck('id')->toArray())->where('subable_type',get_class(app(PromoCode::class)))->distinct('user_id')->pluck('user_id')->toArray();
        $result = array_diff($data['user_subs']->pluck('id')->toArray(), $data['promo_code_sub']);
        $data['enterprise_code_sub'] = Subscription::whereIn('user_id',$result)->where('subable_type',get_class(app(EnterpriseCopone::class)))->distinct('user_id')->pluck('subable_id')->toArray();
        $data['enterprise'] = EnterpriseSubscription::whereDate('end_date','>=',Carbon::now())->get();
        foreach ($data['enterprise'] as $value) {
            $value['copone_count'] = EnterpriseCopone::whereIn('id',$data['enterprise_code_sub'])->where('enterprise_subscription_id',$value->id)->count();
        }

        return view('admin.index',compact('data'));
    }
}

