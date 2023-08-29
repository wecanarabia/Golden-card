<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Area;
use App\Models\Role;
use App\Models\Offer;
use App\Models\Branch;
use App\Models\Service;
use App\Models\Voucher;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ImageService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OfferRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Dash\BranchRequest;
use App\Http\Requests\Admin\ServiceRequest;
use App\Http\Requests\Dash\ServiceImageRequest;
use Stevebauman\Location\Facades\Location;
use Symfony\Component\HttpFoundation\Request as HttpRequest;


class ServiceController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->can('all-services')) {
            $data = Service::with('admin')->latest()->get();
        }elseif(Auth::user()->can('services')){
            $data = Service::with('admin')->where('admin_id',Auth::user()->id)->latest()->get();
        }
        return view('admin.services.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ipAddress = file_get_contents('https://www.whatsmyip.com/api/v1/ip/');
        $currentUserInfo = Location::get($ipAddress);
        dd($currentUserInfo);

        $subcategories = Subcategory::get();
        return view('admin.services.create',compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $request['password']=bcrypt($request->password);
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['description']=['en'=>$request->english_description,'ar'=>$request->arabic_description];
        $request['admin_id'] = Auth::user()->id;
        $request['role_id']=Role::where('roleable_id',0)->where('roleable_type',get_class(app(Service::class)))->first()->id;
        $service = Service::create($request->except([
            'english_name',
            'arabic_name',
            'english_description',
            'arabic_description',
            'subcategories',
        ]));

        $service->subcategories()->attach($request->subcategories);

        return redirect()->route('admin.services.show',$service->id)
                        ->with('success','Partner has been added successfully');
    }



    public function show(string $id)
    {
        if (Auth::user()->can('all-services')) {
            $service = Service::with(['branches','images','offers','admin'])->findOrFail($id);
        }elseif(Auth::user()->can('services')){
            $service = Service::with(['branches','images','offers','admin'])->where('admin_id',Auth::user()->id)->findOrFail($id);;
        }
        // Get the latest offers for a given service and load their vouchers
        $offers = Offer::latest()->whereBelongsTo($service)->get()->load('vouchers');
        // Get the total discount value of all vouchers for those offers
        $vouchers = Voucher::with(['offer','user','branch'])
            ->whereIn('offer_id', $offers->pluck('id')) // Filter by offer ids
            ->get();
            $total = 0;
        foreach ($vouchers as $voucher) {
            $total+=$voucher->offer->discount_value;
        }
        $profits = $total * ($service->profit_margin/100);
        return view('admin.services.show',compact('service','profits','vouchers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::user()->can('all-services')) {
            $service = Service::findOrFail($id);
        }elseif(Auth::user()->can('services')){
            $service = Service::where('admin_id',Auth::user()->id)->findOrFail($id);;
        }
        $subcategories = Subcategory::get();
        return view('admin.services.edit',compact('service','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, string $id)
    {
        $service = Service::findOrFail($id);
        if ($request->password != null) {
            $request['password']=bcrypt($request->password);
        }else{
            unset($request['password']);
        }
        if ($request->has('logo')&&$service->logo  && File::exists($service->logo)) {
            unlink($service->logo);
        }
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['description']=['en'=>$request->english_description,'ar'=>$request->arabic_description];
        $service->update($request->except([
            'english_name',
            'arabic_name',
            'english_description',
            'arabic_description',
            'subcategories',
        ]));

        $service->subcategories()->sync($request->subcategories);

        return redirect()->route('admin.services.show',$service->id)
                        ->with('success','Partner has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if (Auth::user()->can('all-services')) {

            Service::findOrFail($request->id)->delete();
        }

        return redirect()->route('admin.services.index')->with('success','Partner has been removed successfully');
    }

    public function createBranch($id){
        if (Auth::user()->can('all-services')) {
            $service = Service::findOrFail($id);
        }elseif(Auth::user()->can('services')){
            $service = Service::where('admin_id',Auth::user()->id)->findOrFail($id);;
        }
        $areas = Area::all();
        return view('admin.services.add-branches',compact('service','areas'));
    }
    public function storeBranch(BranchRequest $request){
        $id = $request->service_id;

        if (Auth::user()->can('all-services')) {
            $service = Service::findOrFail($id);
        }elseif(Auth::user()->can('services')){
            $service = Service::where('admin_id',Auth::user()->id)->findOrFail($id);;
        }
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        Branch::create($request->except([
            'english_name',
            'arabic_name',
        ]));
        return redirect()->route('admin.services.show',$service->id)
                        ->with('success','Branch has been added successfully');
    }

    public function createImages($id){
        if (Auth::user()->can('all-services')) {
            $service = Service::findOrFail($id);
        }elseif(Auth::user()->can('services')){
            $service = Service::where('admin_id',Auth::user()->id)->findOrFail($id);;
        }
        return view('admin.services.add-images',compact('service'));

    }

public function storeImages(ServiceImageRequest $request){
    $id = $request->service_id;
    if (Auth::user()->can('all-services')) {
        $service = Service::findOrFail($id);
    }elseif(Auth::user()->can('services')){
        $service = Service::where('admin_id',Auth::user()->id)->findOrFail($id);;
    }
    if(ImageService::where('service_id',$request->service_id)->count()<5){

    foreach($request->images as $image) {
        if(ImageService::where('service_id',$request->service_id)->count()<5){
            if (ImageService::where('service_id',$request->service_id)->count()==0) {
                $order = 1;
            }else{
                $order = ImageService::where('service_id',$request->service_id)->max('order')+1;
            }
            ImageService::create([
                'image'=>$image,
                'order'=>$order,
                'service_id'=>$request->service_id,
            ]);
        }elseif(ImageService::where('service_id',$request->service_id)->count()==5){
            return redirect()->route('admin.services.show',$service->id)
            ->with('success','Images has been added successfully');
        }
    }
    return redirect()->route('admin.services.show',$service->id)
                    ->with('success','Images has been added successfully');
    }else{
        return redirect()->back()
                    ->with('info','Maximum allowed number of images is 5 images');

    };

}

public function createOffer($id){
    if (Auth::user()->can('all-services')) {
        $service = Service::findOrFail($id);
    }elseif(Auth::user()->can('services')){
        $service = Service::where('admin_id',Auth::user()->id)->findOrFail($id);;
    }
    $tags = Tag::all();
    $branches = Branch::whereBelongsTo($service)->get();
    return view('admin.services.add-offers',compact('service','tags','branches'));
}
public function storeOffer(OfferRequest $request){
    $id = $request->service_id;

    if (Auth::user()->can('all-services')) {
        $service = Service::findOrFail($id);
    }elseif(Auth::user()->can('services')){
        $service = Service::where('admin_id',Auth::user()->id)->findOrFail($id);;
    }
    $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
    $request['description']=['en'=>$request->english_description,'ar'=>$request->arabic_description];
    $offer = Offer::create($request->except([
        'english_name',
        'arabic_name',
        'english_description',
        'arabic_description',
        'tags',
        'branches'
    ]));
    $offer->tags()->attach($request->tags);
    $offer->branches()->attach($request->branches);
    return redirect()->route('admin.services.show',$service->id)
                    ->with('success','Offer has been created successfully');
}

public function getVouchers(String $id){
    if (Auth::user()->can('all-services')) {
        $service = Service::with(['branches','images','offers','admin'])->findOrFail($id);
    }elseif(Auth::user()->can('services')){
        $service = Service::with(['branches','images','offers','admin'])->where('admin_id',Auth::user()->id)->findOrFail($id);;
    }
    // Get the latest offers for a given service and load their vouchers
    $offers = Offer::latest()->whereBelongsTo($service)->get()->load('vouchers');
    // Get the total discount value of all vouchers for those offers
    $vouchers = Voucher::with(['offer','user','branch'])
        ->whereIn('offer_id', $offers->pluck('id')) // Filter by offer ids
        ->get();
    return view('admin.services.vouchers',compact('service','vouchers'));

}
}
