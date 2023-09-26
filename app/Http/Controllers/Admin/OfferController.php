<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Offer;
use App\Models\Branch;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\OfferRequest;

class OfferController extends Controller
{
         /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->can('all-services')) {
            $data = Offer::with('service')->latest()->get();
        }elseif(Auth::user()->can('services')){
            $services = Service::where('admin_id',Auth::user()->id)->latest()->get();
            if (empty($services)) {
                $data=collect([]);
            }else{
                $data = Offer::latest()->with('service')->orderBy('service_id')->whereBelongsTo($services)->get();
            }
        }
        return view('admin.offers.index',compact('data'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function create()
    {

        $services = Service::whereStatus(1)->get();

        $tags = Tag::all();
        $branches = Branch::all();
        return view('admin.offers.create',compact('branches','tags','services'));
    }

    public function store(OfferRequest $request)
    {


        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['description']=['en'=>$request->english_description,'ar'=>$request->arabic_description];
        $offer = Offer::create($request->except([
            'english_name',
            'arabic_name',
            'english_description',
            'arabic_description',
            'tags',
            'branches',

        ]));
        $offer->tags()->attach($request->tags);
        $offer->branches()->attach($request->branches);

        return redirect()->route('admin.offers.index')
                        ->with('success','Offer has been created successfully');
    }

    public function show(string $id)
    {
        if (Auth::user()->can('all-services')) {
            $offer = Offer::with(['tags','branches','service','vouchers'])->findOrFail($id);
        }elseif(Auth::user()->can('services')){
            $services = Service::where('admin_id',Auth::user()->id)->latest()->get();
            $offer = Offer::with(['tags','branches','service','vouchers'])->whereBelongsTo($services)->findOrFail($id);

        }
        return view('admin.offers.show',compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::user()->can('all-services')) {
            $offer = Offer::with(['tags','branches'])->findOrFail($id);
            $service = Service::findOrFail($offer->service_id);
            $branches = Branch::with('service')->whereBelongsTo($service)->latest()->get();
        }elseif(Auth::user()->can('services')){
            $offer = Offer::with(['tags','branches'])->findOrFail($id);
            if ($offer->service->admin_id!=Auth::user()->id) {
                return abort('405');
            }else{
                $service = Service::findOrFail($offer->service_id);
            }
            $branches = Branch::with('service')->whereBelongsTo($service)->latest()->get();
        }
        $tags = Tag::all();
        return view('admin.offers.edit',compact('offer','branches','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OfferRequest $request, string $id)
    {
        $offer = Offer::findOrFail($id);
        if ($request->has('image')&&$offer->image  && File::exists($offer->image)) {
            unlink($offer->image);
        }
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['description']=['en'=>$request->english_description,'ar'=>$request->arabic_description];
        $offer->update($request->except([
            'english_name',
            'arabic_name',
            'english_description',
            'arabic_description',
            'tags',
            'branches',
        ]));
        $offer->tags()->sync($request->tags);
        if($offer->branches()->count()>0){
            $offer->branches()->sync($request->branches);
        }else{
            $offer->branches()->attach($request->branches);
        }

        return redirect()->route('admin.offers.index')
                        ->with('success','Offer has been updated successfully');
    }
    public function getBranches($serviceId)
    {
        $branches = Branch::where('service_id', $serviceId)->get();
        return response()->json(['branches' => $branches]);
    }
}
