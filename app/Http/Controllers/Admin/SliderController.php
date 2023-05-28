<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\SliderRequest;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Slider::latest()->paginate(10);
        return view('admin.slider.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {

        Slider::create($request->all());


        return redirect()->route('admin.slider.index')
                        ->with('success','Slider has been added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, string $id)
    {
        $slider = Slider::findOrFail($id);
        if ($request->has('image')&&$slider->image  && File::exists($slider->image)) {
            unlink($slider->image);
        }

        $slider->update($request->all());


        return redirect()->route('admin.slider.index')
                        ->with('success','Slider has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Slider::findOrFail($request->id)->delete();
        return redirect()->route('admin.slider.index')->with('success','Slider has been removed successfully');
    }
}
