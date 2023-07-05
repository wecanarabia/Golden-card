<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AreaRequest;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Area::orderBy('order','asc')->get();
        return view('admin.areas.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.areas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AreaRequest $request)
    {
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['order']=Area::max('order') + 1;
        Area::create($request->except([
            'english_name',
            'arabic_name',
        ]));

        return redirect()->route('admin.areas.index')
                        ->with('success','Area has been added successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $area = Area::findOrFail($id);
        return view('admin.areas.edit',compact('area'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AreaRequest $request, string $id)
    {
        $area = Area::findOrFail($id);
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $area->update($request->except([
            'english_name',
            'arabic_name',
        ]));


        return redirect()->route('admin.areas.index')
                        ->with('success','Area has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Area::findOrFail($request->id)->delete();
        return redirect()->route('admin.areas.index')->with('success','Area has been removed successfully');
    }

    public function sortData($id,$direction = 'up'){
        $model=Area::findOrFail($id);
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
        return redirect()->route('admin.areas.index');
    }

    public function sortProcess($model,$direction)
    {
        $page = $model;
        $id = $model->id;
        if ($direction == 'up') {
            $order = $model->where("order", '<', $page->order)->orderBy('order','desc')->first();
        } else {
            $order =  $model->where("order", '>', $page->order)->orderBy('order','asc')->first();
        }
        if ($order) {
            $page->where('id',$id)->update(['order'=>$order->order]);
            $order->where('id',$order->id)->update(['order'=>$page->order]);
            return TRUE;
        }
    }

}
