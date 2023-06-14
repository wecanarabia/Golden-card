<?php

namespace App\Http\Controllers\Dash;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dash\ServiceRequest;

class ServiceController extends Controller
{
    protected $auth;
    public function __construct(AuthService $auth)
    {
        $this->auth=$auth;
    }

    public function show(Service $service)
    {
        if ($service->id != $this->auth->service()) {
            return abort('404');
        }else{
            return view('dash.services.show',compact('service'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        if ($service->id != $this->auth->service()) {
            return abort('404');
        }else{
            return view('dash.services.edit',compact('service'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request,Service $service)
    {
        if ($service->id != $this->auth->service()) {
            return abort('404');
        }else{
            if ($request->password != null) {
                $request['password']=bcrypt($request->password);
            } else {
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
            return redirect()->route('dash.services.show', $service->slug);
        }  
    }
}
