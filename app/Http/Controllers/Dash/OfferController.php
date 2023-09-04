<?php

namespace App\Http\Controllers\Dash;

use App\Models\Tag;
use App\Models\Offer;
use App\Models\Branch;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Dash\OfferRequest;

class OfferController extends Controller
{
    protected $auth;
    public function __construct(AuthService $auth)
    {
        $this->auth=$auth;
        $this->middleware('can:view')->only(["index","show"]);
        $this->middleware('can:control')->only(["create","store","edit","update"]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service = Service::findOrFail($this->auth->service());
        $data = Offer::latest()->whereBelongsTo($service)->get();
        return view('dash.offers.index',compact('data'));
    }

    public function create()
    {
        $service = Service::findOrFail($this->auth->service());
        $branches = Branch::where('service_id',$service->id)->latest()->get();
        $tags = Tag::all();
        return view('dash.offers.create',compact('branches','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function store(OfferRequest $request)
    {
        $request['service_id']=$this->auth->service();
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['description']=['en'=>$request->english_description,'ar'=>$request->arabic_description];
        $offer=Offer::create($request->except([
            'english_name',
            'arabic_name',
            'english_description',
            'arabic_description',
            'tags',
            'branches',
        ]));
        $offer->tags()->attach($request->tags);
        $offer->branches()->attach($request->branches);

        return redirect()->route('dash.offers.index')
                        ->with('success','Offer has been created successfully');
    }

    public function show($offer)
    {
        $offer = Offer::with(['tags','branches'])->whereSlug($offer)->whereServiceId($this->auth->service())->firstOrFail();
        return view('dash.offers.show',compact('offer'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($offer)
    {
        $offer = Offer::with(['tags','branches'])->whereSlug($offer)->whereServiceId($this->auth->service())->firstOrFail();
        $branches = Branch::where('service_id',$offer->service_id)->latest()->get();
        $tags = Tag::all();
        return view('dash.offers.edit',compact('offer','branches','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OfferRequest $request,$offer)
    {
        $offer = Offer::whereSlug($offer)->whereServiceId($this->auth->service())->firstOrFail();
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
        $offer->branches()->sync($request->branches);

        return redirect()->route('dash.offers.index')
                        ->with('success', 'Offer has been updated successfully');


    }


}
