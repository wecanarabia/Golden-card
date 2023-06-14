<?php

namespace App\Http\Controllers\Dash;

use App\Models\Area;
use App\Models\Branch;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dash\BranchRequest;

class BranchController extends Controller
{
    protected $auth;
    public function __construct(AuthService $auth)
    {
        $this->auth=$auth;
    }

    public function index()
    {
        $service = Service::findOrFail($this->auth->service());
        $data = Branch::whereBelongsTo($service)->latest()->paginate(10);
        return view('dash.branches.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Area::all();
        return view('dash.branches.create',compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BranchRequest $request)
    {
        $request['service_id']=$this->auth->service();
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        Branch::create($request->except([
            'english_name',
            'arabic_name',
        ]));

        return redirect()->route('dash.branches.index')
                        ->with('success','Branch has been added successfully');
    }



    public function show(Branch $branch)
    {
        if ($branch->service_id != $this->auth->service()) {
            return abort('404');
        }else{
            $branch->load('area');
            return view('dash.branches.show',compact('branch'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        if ($branch->service_id != $this->auth->service()) {
            return abort('404');
        }else{
    $branch->load('area');
    $areas = Area::all();
    return view('dash.branches.edit', compact('branch', 'areas'));
}
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BranchRequest $request, Branch $branch)
    {
        if ($branch->service_id != $this->auth->service()) {
            return abort('404');
        }else{
            $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
            $branch->update($request->except([
                'english_name',
                'arabic_name',
            ]));


            return redirect()->route('dash.branches.index')
                            ->with('success','Branch has been updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Branch::where('service_id',$this->auth->service())->findOrFail($request->id)->delete();
        return redirect()->route('dash.branches.index')->with('success','Branch has been removed successfully');
    }
}
