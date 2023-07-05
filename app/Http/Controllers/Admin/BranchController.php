<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use App\Models\Branch;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\BranchRequest;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->can('all-services')) {
            $data = Branch::with('service')->latest()->get();
        }elseif(Auth::user()->can('services')){
            $services = Service::where('admin_id',Auth::user()->id)->latest()->get();
            $data = Branch::with('service')->whereBelongsTo($services)->latest()->get();
        }
        return view('admin.branches.index',compact('data'));
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
        $areas = Area::all();
        return view('admin.branches.create',compact('services','areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BranchRequest $request)
    {
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        Branch::create($request->except([
            'english_name',
            'arabic_name',
        ]));


        return redirect()->route('admin.branches.index')
                        ->with('success','Branch has been added successfully');
    }



    public function show(string $id)
    {
        if (Auth::user()->can('all-services')) {
            $branch = Branch::with(['service','area'])->findOrFail($id);
        }elseif(Auth::user()->can('services')){
            $services = Service::where('admin_id',Auth::user()->id)->latest()->get();
            $branch = Branch::with(['service','area'])->whereBelongsTo($services)->findOrFail($id);

        }
        return view('admin.branches.show',compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::user()->can('all-services')) {
            $branch = Branch::with(['service','area'])->findOrFail($id);
            $services = Service::all();
        }elseif(Auth::user()->can('services')){
            $services = Service::where('admin_id',Auth::user()->id)->latest()->get();
            $branch = Branch::with(['service','area'])->whereBelongsTo($services)->findOrFail($id);
        }
        $areas = Area::all();
        return view('admin.branches.edit',compact('branch','services','areas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BranchRequest $request, string $id)
    {
        $branche = Branch::findOrFail($id);

        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $branche->update($request->except([
            'english_name',
            'arabic_name',
        ]));


        return redirect()->route('admin.branches.index')
                        ->with('success','Branch has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if (Auth::user()->can('all-services')) {
            Branch::findOrFail($request->id)->delete();
        }
        return redirect()->route('admin.branches.index')->with('success','Branch has been removed successfully');
    }
}
