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
use App\Models\Subcategory;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index($period = null)
    {
        if ($period == null) {
            $date = Carbon::now();
        } elseif ($period == 'week') {
            $date = Carbon::now()->subWeek();
        } elseif ($period == 'month') {
            $date = Carbon::now()->subMonth();
        } elseif ($period == 'year') {
            $date = Carbon::now()->subYear();
        }
        $data['sub_earn'] = Subscription::where('plan_id', '<>', 4)->sum('value');
        $data['sub_period_earn'] = Subscription::whereDate('start_date', '>=', $date)->whereDate('end_date', '>=', Carbon::now())->where('plan_id', '<>', 4)->sum('value');
        $data['new_customer_count'] = User::count();
        $data['new_customer_period_count'] = User::whereDate('created_at', '>=', $date)->count();
        $data['voucher_count'] = Voucher::count();
        $data['voucher_period_count'] = Voucher::whereDate('created_at', '>=', $date)->count();
        $data['categories'] = Category::with(['subcategories'])->get();
        //used vouchers
        $data['total_category_profits'] = 0;
        foreach ($data['categories'] as $category) {
            if (!empty($category->subcategories)) {
                $subcategories = Subcategory::where('category_id',$category->id)->pluck('id')->toArray();
                $services = Service::whereStatus(1)->whereHas('subcategories', function($q)use($category){
                    $q->where('category_id',$category->id);
                })->get();

                $category['services_count'] = Service::whereStatus(1)->whereHas('subcategories', function($q)use($category){
                    $q->where('category_id',$category->id);
                })->count();
                $category['services_period_count'] = Service::whereDate('created_at', '>=', $date)->whereStatus(1)->whereHas('subcategories', function($q)use($category){
                    $q->where('category_id',$category->id);
                })->count();
                if ($services->count() > 0) {
                    $category['profits'] = 0;
                    //get profits
                    foreach ($services as $service) {
                        $profits = $this->getProfits($service);
                        $category['profits'] += $profits;
                    }
                    $data['total_category_profits'] += $category['profits'];

                    $offers = Offer::whereStatus(1)->whereBelongsTo($services)->get();
                    if ($offers->count() > 0) {
                        $category['vouchers'] = Voucher::whereBelongsTo($offers)->count();
                    } else {
                        $category['vouchers'] = 0;
                    }
                } else {
                    $category['vouchers'] = 0;
                }
            }
        }
        $data['total_subsription_profit'] = Subscription::sum('value');
        $data['total_profits'] = $data['total_category_profits'] + $data['total_subsription_profit'];
        $data['user_subs'] = User::whereHas('subscription', function ($q) {
            $q->whereDate('end_date', '>=', Carbon::now());
        })->get();

        $data['promo_code_sub'] = Subscription::whereIn('user_id', $data['user_subs']->pluck('id')->toArray())->where('subable_type', get_class(app(PromoCode::class)))->distinct('user_id')->pluck('user_id')->toArray();
        $result = array_diff($data['user_subs']->pluck('id')->toArray(), $data['promo_code_sub']);
        $data['enterprise_code_sub'] = Subscription::whereIn('user_id', $result)->where('subable_type', get_class(app(EnterpriseCopone::class)))->distinct('user_id')->pluck('subable_id')->toArray();
        $data['enterprise'] = EnterpriseSubscription::whereDate('end_date', '>=', Carbon::now())->get();
        foreach ($data['enterprise'] as $value) {
            $value['copone_count'] = EnterpriseCopone::whereIn('id', $data['enterprise_code_sub'])->where('enterprise_subscription_id', $value->id)->count();
        }

        $activeUsers = User::whereBetween('updated_at', [Carbon::now()->subDays(7), Carbon::now()])->get();
        $data['active_users'] = ($activeUsers->count() / User::count()) * 100;

        $data['chart'] = $this->getEarningChart();
        return view('admin.index', compact('data'));
    }

    public function getProfits($service)
    {
        $offers = Offer::latest()->whereBelongsTo($service)->get()->load('vouchers');
        // Get the total discount value of all vouchers for those offers
        $vouchers = Voucher::with('offer')
            ->whereIn('offer_id', $offers->pluck('id')) // Filter by offer ids
            ->get();
        $total = 0;
        foreach ($vouchers as $voucher) {
            $total += $voucher->offer->discount_value;
        }
        return $total * ($service->profit_margin / 100);
    }

    public function getEarningChart()
    {
        $earnings = [];
        foreach (range(1,12) as $month) {
            $earnings[] = $this->getRevenueMonth($month);
        }
        $chartjs = app()->chartjs
            ->name('lineChartTest')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels([
                'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
                'September', 'October', 'November', 'December'
            ])
            ->datasets([
                [
                    "label" => "Total Earning (QR)",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $earnings,
                ],
            ])
            ->options([]);
        return $chartjs;
    }

    public function getRevenueMonth($month){
        $services = Service::whereStatus(1)->get();
        foreach ($services as $service) {
            $offers = Offer::latest()->whereBelongsTo($service)->get()->load('vouchers');
            // Get the total discount value of all vouchers for those offers
            $vouchers = Voucher::with('offer')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $month)
                ->whereIn('offer_id', $offers->pluck('id')) // Filter by offer ids
                ->get();
            $total = 0;
            foreach ($vouchers as $voucher) {
                $total += $voucher->offer->discount_value;
            }
            return ($total * ($service->profit_margin / 100))+Subscription::whereMonth('created_at', $month)->sum('value');

        }
    }
}
