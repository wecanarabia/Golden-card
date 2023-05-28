<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Models\ImageService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceImageRequest;

class ServiceImageController extends Controller
{
         /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ImageService::latest()->with('service')->paginate(10);
        return view('admin.service_images.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.service_images.create',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceImageRequest $request)
    {
        foreach($request->images as $image) {
            ImageService::create([
                'image'=>$image,
                'service_id'=>$request->service_id,
            ]);
        }
        return redirect()->route('admin.service_images.index')
                        ->with('success','Category has been added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $iamge = ImageService::with('service')->findOrFail($id);
        $services = Service::all();
        return view('admin.service_images.edit',compact('category','services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceImageRequest $request, string $id)
    {
        $category = ImageService::findOrFail($id);
        if ($request->has('image')&&$category->image  && File::exists($category->image)) {
            unlink($category->image);
        }
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $category->update($request->except([
            'english_name',
            'arabic_name',
        ]));


        return redirect()->route('admin.service_images.index')
                        ->with('success','Category has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        ImageService::findOrFail($request->id)->delete();
        return redirect()->route('admin.service_images.index')->with('success','Category has been removed successfully');
    }
}
