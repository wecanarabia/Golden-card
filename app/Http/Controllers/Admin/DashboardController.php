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
        $data['categories'] = Category::with(['subcategories'])->parent()->get();
        foreach ($data['categories'] as $category) {
            if (!empty($category->subcategories)) {
                $category['service_count'] = Service::whereIn('category_id',$category->subcategories->pluck('id')->toArray())->count();
            }
           
        }
        dd($data['categories']);
        return view('admin.index',compact('data'));
    }
}

