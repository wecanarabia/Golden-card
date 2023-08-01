<?php

namespace App\Http\Controllers\Dash;

use App\Models\Role;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dash\RoleRequest;

class RoleController extends Controller
{
    protected $auth;
    public function __construct(AuthService $auth)
    {
        $this->auth=$auth;
        $this->middleware('can:view')->only(["index","show"]);
        $this->middleware('can:control')->only(["create","store","edit","update","destroy"]);
    }
    public function index()
    {
        $service = Service::findOrFail($this->auth->service());
        $data=Role::whereHasMorph('roleable',[Service::class],function ($query) {
            $query->where('id', $this->auth->service());
        })->latest()->get();
        return view('dash.roles.index', compact('data'));
    }

    public function create(){
        return view('dash.roles.create');
    }

    public function store(RoleRequest $request){

            $role = $this->process(new Role, $request);

                return redirect()->route('dash.roles.index')->with(['success' => "Role has been created successfully"]);



    }

    public function show($id){
        $role = Role::where('roleable_id',$this->auth->service())->findOrFail($id);
        return view('dash.roles.show', compact('role'));
    }

    public function edit($id){
        $role = Role::where('roleable_id',$this->auth->service())->findOrFail($id);
        return view('dash.roles.edit', compact('role'));
    }

    public function update(RoleRequest $request,$id){

            $role = Role::where('roleable_id',$this->auth->service())->findOrFail($id);


            $role = $this->process($role, $request);
            return redirect()->route('dash.roles.index')->with(['success' => "Role has been updated successfully"]);

    }

    public function process(Role $role,Request $r)
    {

        $role->name=$r->name;
        $role->roleable_id=$this->auth->service();
        $role->roleable_type=get_class(app(Service::class));
        $role->permissions=json_encode($r->permissions);
        $role->save();
        return $role;
    }

        /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Role::where('roleable_id',$this->auth->service())->findOrFail($request->id)->delete();
        return redirect()->route('dash.roles.index')->with('success','Role has been removed successfully');
    }
}
