<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Models\Service;
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
        $data = Slider::latest()->get();
        return view('admin.slider.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.slider.create',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        $request['order']=Slider::max('order') + 1;
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
        $services = Service::all();
        return view('admin.slider.edit',compact('slider','services'));
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

    public function sortData($id,$direction = 'up'){
        $model=Slider::findOrFail($id);
        switch ($direction) {
            case 'up':
                $this->sortProcess($model,$direction);
                break;
            case 'down':
                $this->sortProcess($model,$direction);
                break;
            default:
                break;
        }
        return redirect()->route('admin.slider.index');
    }

    public function sortProcess($model,$direction)
    {
        $page = $model;
        $id = $model->id;
        if ($direction == 'up') {
            $order = $model->when($page->order, function ($query, $pageOrder) {
                return $query->where("order", '<', $pageOrder);
            })->orderBy('order','desc')->firstOrFail();
        } else {
            $order = $model->when($page->order, function ($query, $pageOrder) {
                return $query->where("order", '>', $pageOrder);
            })->orderBy('order','asc')->firstOrFail();
        }
        if ($order) {
            $page->where('id',$id)->update(['order'=>$order->order]);
            $order->where('id',$order->id)->update(['order'=>$page->order]);
            return TRUE;
        }
    }
}
