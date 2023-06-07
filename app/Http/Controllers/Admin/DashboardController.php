<?php

namespace App\Http\Controllers\Admin;

use App\Models\Offer;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Models\Voucher;

class DashboardController extends Controller
{
    public function index()
    {
        $data['service_count'] = Service::whereStatus(1)->count();
        $data['user_count'] = User::count();
        $data['offer_count'] = Offer::whereStatus(1)->count();
        $data['voucher_count'] = Voucher::count();
        $data['subs'] = Category::sub->withCount('services')->get();
        $data['categories'] = Category::with(['subcategories'=>function($q)use($data){
            $q->whereIn('parent_id',$data['subs']->pluck('id')->toArray());
        }])->parent()->get();
        foreach ($data['categories']as $category) {
            $count = Service::whereIn('category_id',$data['subs']->pluck('id')->toArray())->count();
            $category['service_count']=$count;
        }
        return view('admin.index',compact('data'));
    }
}

