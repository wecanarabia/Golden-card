<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PlanRequest;

class PlanController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Plan::where('id','<>',4)->latest()->paginate(10);
        return view('admin.plans.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlanRequest $request)
    {
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['details']=['en'=>$request->english_details,'ar'=>$request->arabic_details];
        Plan::create($request->except([
            'english_name',
            'arabic_name',
            'english_details',
            'arabic_details',
        ]));


        return redirect()->route('admin.plans.index')
                        ->with('success','Plan has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $plan = Plan::findOrFail($id);
        return view('admin.plans.show',compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $plan = Plan::where('id','<>',4)->findOrFail($id);
        return view('admin.plans.edit',compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlanRequest $request, string $id)
    {
        $plan = Plan::where('id','<>',4)->findOrFail($id);
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['details']=['en'=>$request->english_details,'ar'=>$request->arabic_details];
        $plan->update($request->except([
            'english_name',
            'arabic_name',
            'english_details',
            'arabic_details',
        ]));


        return redirect()->route('admin.plans.index')
                        ->with('success','Plan has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Plan::where('id','<>',4)->findOrFail($request->id)->delete();
        return redirect()->route('admin.plans.index')->with('success','Plan has been removed successfully');
    }
}
