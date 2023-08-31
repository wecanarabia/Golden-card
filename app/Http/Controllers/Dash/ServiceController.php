<?php

namespace App\Http\Controllers\Dash;

use App\Models\Service;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Dash\ServiceRequest;

class ServiceController extends Controller
{
    protected $auth;
    public function __construct(AuthService $auth)
    {
        $this->auth=$auth;
        $this->middleware('can:view')->only(["show"]);
        $this->middleware('can:control')->only(["edit","update"]);

    }

    public function show($service)
    {
        $service = Service::with('subcategories')->whereSlug($service)->firstOrFail();
        return view('dash.services.show',compact('service'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($service)
    {
        $service = Service::whereSlug($service)->firstOrFail();
        $subcategories = Subcategory::get();
        $categories = Category::get();

        return view('dash.services.edit',compact('service','categories','subcategories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request,$service)
    {
        $service = Service::whereSlug($service)->firstOrFail();
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
            'category_id',
        ]));
        $service->subcategories()->sync($request->subcategories);

        return redirect()->route('dash.services.show', $service->slug);
    }
}
