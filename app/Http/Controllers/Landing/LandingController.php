<?php

namespace App\Http\Controllers\Landing;

use App\Models\Faq;
use App\Models\Page;
use App\Models\Plan;
use App\Models\Service;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class LandingController extends Controller
{
    public function getLanding() {
        $data['faqs'] = Faq::all();
        $data['plans'] = Plan::whereNotIn('id',[4])->get();
        foreach ($data['plans'] as $plan) {
            $plan['sub_count']=Subscription::where('plan_id',$plan->id)->count();
            $data['plansubs'][$plan['sub_count']]=$plan;
        }
        $keys = array_keys($data['plansubs']); // Get an array of all the keys of your array
        $max_key = max($keys); // Get the max key of $plan['plansubs']
        $value = $data['plansubs'][$max_key]; // Store the value of the element with max key
        unset($data['plansubs'][$max_key]); // Remove the element with max key
        $mid = floor(count($data['plansubs']) / 2); // Find the middle index of the array
        array_splice($data['plansubs'], $mid, 0, [$max_key => $value]); // Insert the element with max key at the middle of the array
        $data['max_sub_count']=collect($data['plansubs'])->max('sub_count');

        $data['restaurant_count'] = $this->servicesCount('Restaurants');
        $data['salon_count'] = $this->servicesCount('Salons');
        $data['hotel_count'] = $this->servicesCount('Hotels');
        $data['shop_count'] = $this->servicesCount('Shop');
        return view('landing.index',compact('data'));
    }

    public function servicesCount($name)  {
        $category = Category::where('name->en',$name)->first()->id??null;
        if ($category) {
            $subCategories = Subcategory::where('category_id',$category->id)->pluck('id')->toArray();
            return Service::whereStatus(1)->whereIn('category_id',$subCategories)->count();
        }else{
            return 0;
        }
    }

    public function about() {
        $about = Page::where('title->en','About us')->first()->body??null;
        return view('landing.about-page',compact('about'));
    }

    public function privacyPolicy() {
        $privacy = Page::where('title->en','Privacy Policy')->first()->body??null;
        return view('landing.privacy-policy',compact('privacy'));
    }

    public function terms() {
        $conditions = Page::where('title->en','Terms of Use')->first()->body??null;
        return view('landing.terms',compact('conditions'));
    }
}
