<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Models\ImageService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\ServiceImageRequest;

class ServiceImageController extends Controller
{
         /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->can('all-services')) {
            $data = ImageService::latest()->with('service')->orderBy('service_id')->get();
        }elseif(Auth::user()->can('services')){
            $services = Service::where('admin_id',Auth::user()->id)->latest()->get();
            $data = ImageService::latest()->with('service')->orderBy('service_id')->whereBelongsTo($services)->get();

        }
        return view('admin.service-images.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->can('all-services')) {
            $services = Service::all();
        }elseif(Auth::user()->can('services')){
            $services = Service::where('admin_id',Auth::user()->id)->latest()->get();

        }
        return view('admin.service-images.create',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceImageRequest $request)
    {
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
                return redirect()->route('admin.service-images.index')
                    ->with('success','Service Images has been added successfully');
            }
        }
        return redirect()->route('admin.service-images.index')
                        ->with('success','Partner Images has been added successfully');
        }else{
            return redirect()->back()
                        ->with('info','Maximum allowed number of images for Partner is 5 images');

        };
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::user()->can('all-services')) {
            $services = Service::all();
            $image = ImageService::with('service')->findOrFail($id);
        }elseif(Auth::user()->can('services')){
            $services = Service::where('admin_id',Auth::user()->id)->latest()->get();
            $image = ImageService::with('service')->whereBelongsTo($services)->findOrFail($id);

        }
        return view('admin.service-images.edit',compact('image','services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceImageRequest $request, string $id)
    {
        $image = ImageService::findOrFail($id);
        if($request->service_id!==$image->service_id&&ImageService::where('service_id',$request->service_id)->count()<=5){

        if ($request->has('image')&&$image->image  && File::exists($image->image)) {
            unlink($image->image);
        }
        $image->update($request->all());


        return redirect()->route('admin.service-images.index')
                        ->with('success','Partner Image has been updated successfully');
        }else{
            return redirect()->back()
                        ->with('info','Maximum allowed number of images for Partner is 5 images');

        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        ImageService::findOrFail($request->id)->delete();
        return redirect()->route('admin.service-images.index')->with('success','Partner Image has been removed successfully');
    }
}
