<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\ServiceRequest;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->can('all-services')) {
            $data = Service::with('admin')->latest()->paginate(10);
        }elseif(Auth::user()->can('services')){
            $data = Service::with('admin')->where('admin_id',Auth::user()->id)->latest()->paginate(10);
        }
        return view('admin.services.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::sub()->get();
        return view('admin.services.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $request['password']=bcrypt($request->password);
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['description']=['en'=>$request->english_description,'ar'=>$request->arabic_description];
        $request['admin_id'] = Auth::user()->id;
        $request['role_id']=Role::where('roleable_id',0)->where('roleable_type',get_class(app(Service::class)))->first()->id;
        Service::create($request->except([
            'english_name',
            'arabic_name',
            'english_description',
            'arabic_description',
        ]));


        return redirect()->route('admin.services.index')
                        ->with('success','Partner has been added successfully');
    }



    public function show(string $id)
    {
        if (Auth::user()->can('all-services')) {
            $service = Service::with(['branches','images','offers','admin'])->findOrFail($id);
        }elseif(Auth::user()->can('services')){
            $service = Service::with(['branches','images','offers','admin'])->where('admin_id',Auth::user()->id)->findOrFail($id);;
        }
        return view('admin.services.show',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::user()->can('all-services')) {
            $service = Service::findOrFail($id);
        }elseif(Auth::user()->can('services')){
            $service = Service::where('admin_id',Auth::user()->id)->findOrFail($id);;
        }
        $categories = Category::sub()->get();
        return view('admin.services.edit',compact('service','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, string $id)
    {
        $service = Service::findOrFail($id);
        if ($request->password != null) {
            $request['password']=bcrypt($request->password);
        }else{
            unset($request['password']);
        }
        if ($request->has('logo')&&$service->logo  && File::exists($service->logo)) {
            unlink($service->logo);
        }
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $request['description']=['en'=>$request->english_description,'ar'=>$request->arabic_description];
        $service->update($request->except([
            'english_name',
            'arabic_name',
            'english_description',
            'arabic_description',
        ]));


        return redirect()->route('admin.services.index')
                        ->with('success','Partner has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if (Auth::user()->can('all-services')) {

            Service::findOrFail($request->id)->delete();
        }

        return redirect()->route('admin.services.index')->with('success','Partner has been removed successfully');
    }
}
