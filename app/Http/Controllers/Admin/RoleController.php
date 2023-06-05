<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;

class RoleController extends Controller
{
    public function index()
    {
       $data=Role::where('roleable_id',0)->latest()->paginate(10);
        return view('admin.roles.index', compact('data'));
    }

    public function create(){
        return view('admin.roles.create');
    }

    public function store(RoleRequest $request){

            $role = $this->process(new Role, $request);

                return redirect()->route('admin.roles.index')->with(['success' => "Role has been created successfully"]);



    }

    public function show($id){
        $role = Role::where('roleable_id',0)->findOrFail($id);
        return view('admin.roles.show', compact('role'));
    }

    public function edit($id){
        $role = Role::where('roleable_id',0)->findOrFail($id);
        return view('admin.roles.edit', compact('role'));
    }

    public function update(RoleRequest $request,$id){

            $role = Role::where('roleable_id',0)->findOrFail($id);


            $role = $this->process($role, $request);
            return redirect()->route('admin.roles.index')->with(['success' => "Role has been updated successfully"]);

    }

    public function process(Role $role,Request $r)
    {
        if (in_array('all-services',$r->permissions)&&!in_array('services',$r->permissions)) {
            array_push($r->permissions,'servicecs');
        }
        $role->name=$r->name;
        $role->roleable_id=0;
        $role->roleable_type=get_class(app(Admin::class));
        $role->permissions=json_encode($r->permissions);
        $role->save();
        return $role;
    }

        /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Role::findOrFail($request->id)->delete();
        return redirect()->route('admin.roles.index')->with('success','Role has been removed successfully');
    }
}
