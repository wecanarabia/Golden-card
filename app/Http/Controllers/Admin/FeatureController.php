<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feature;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FeatureRequest;

class FeatureController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Feature::with('category')->latest()->get();
        return view('admin.features.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::parent()->get();
        return view('admin.features.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeatureRequest $request)
    {
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        Feature::create($request->except([
            'english_name',
            'arabic_name',
        ]));


        return redirect()->route('admin.features.index')
                        ->with('success','Feature has been added successfully');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $feature = Feature::findOrFail($id);
        $categories = Category::parent()->get();
        return view('admin.features.edit',compact('feature','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FeatureRequest $request, string $id)
    {
        $feature = Feature::findOrFail($id);

        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $feature->update($request->except([
            'english_name',
            'arabic_name',
        ]));


        return redirect()->route('admin.features.index')
                        ->with('success','Feature has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Feature::findOrFail($request->id)->delete();
        return redirect()->route('admin.features.index')->with('success','Feature has been removed successfully');
    }
}
