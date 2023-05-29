<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branch;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BranchRequest;
use App\Models\Area;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Branch::with('service')->latest()->paginate(10);
        return view('admin.branches.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
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
        $branch = Branch::with(['service','area'])->findOrFail($id);
        return view('admin.branches.show',compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $branch = Branch::with(['service','area'])->findOrFail($id);
        $services = Service::all();
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
        Branch::findOrFail($request->id)->delete();
        return redirect()->route('admin.branches.index')->with('success','Branch has been removed successfully');
    }
}
