<?php

namespace App\Http\Controllers\Dash;

use App\Models\Role;
use App\Models\ServiceAdmin;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dash\ServiceAdminRequest;

class ServiceAdminController extends Controller
{
    protected $auth;
    public function __construct(AuthService $auth)
    {
        $this->auth=$auth;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ServiceAdmin::latest()->where('service_id',$this->auth->service())->paginate(10);
        return view('dash.admins.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::where('roleable_id',$this->auth->service())->get();
        return view('dash.admins.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceAdminRequest $request)
    {
        $request['password']=bcrypt($request->password);
        $request['service_id']=$this->auth->service();
        ServiceAdmin::create($request->all());


        return redirect()->route('dash.admins.index')
                        ->with('success','Admin has been added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = ServiceAdmin::where('service_id',$this->auth->service())->findOrFail($id);
        $roles = Role::where('roleable_id',$this->auth->service())->get();
        return view('dash.admins.edit',compact('admin','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceAdminRequest $request, string $id)
    {
        $admin = ServiceAdmin::where('service_id',$this->auth->service())->findOrFail($id);
        if ($request->password != null) {
            $request['password']=bcrypt($request->password);
        }else{
            unset($request['password']);
        }
        $admin->update($request->all());


        return redirect()->route('dash.admins.index')
                        ->with('success','Admin has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        ServiceAdmin::where('service_id',$this->auth->service())->findOrFail($request->id)->delete();
        return redirect()->route('dash.admins.index')->with('success','Admin has been removed successfully');
    }
}
