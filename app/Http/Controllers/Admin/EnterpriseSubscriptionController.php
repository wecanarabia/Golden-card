<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EnterpriseCopone;
use App\Http\Controllers\Controller;
use App\Models\EnterpriseSubscription;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\EnterpriseSubscriptionRequest;
use Carbon\Carbon;

class EnterpriseSubscriptionController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = EnterpriseSubscription::latest()->get();
        return view('admin.enterprises.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.enterprises.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EnterpriseSubscriptionRequest $request)
    {
        if ($request->status==1) {
            $request['date_of_activation'] = Carbon::now()->date;
        }
        $subscription=EnterpriseSubscription::create($request->all());
        $name_arr = explode(" ",$request->enterprise_name);
        if (count($name_arr)>1) {
            foreach ($name_arr as $string) {
                $firstLetter = strtoupper(substr($string, 0, 1));
                $firstLetters[] = $firstLetter;
                $name = implode("",$firstLetters);
            }
        }else{
            $name = strtoupper($request->enterprise_name);
        }
        $codes = [];
        for ($i=0; $i < $request->num_of_users; $i++) {
            $code = $name.'#'.rand(0,10000000);
             if(!in_array($code,$codes)){
                $codes[]=$code;
             }else{
                $codes[]=$code.'_'.Str::random(3);
             }
        }



        foreach ($codes as $_code) {
            if (Validator::make(['code'=>$_code], [
                'code'=>'unique:enterprise_copones,code',

            ])->fails()) {
                $_code = Str::random(10);
            }
            EnterpriseCopone::create([
                'enterprise_subscription_id'=>$subscription->id,
                'code'=>$_code,
            ]);
        }

        return redirect()->route('admin.enterprises.index')
                        ->with('success','Entrprise subscription has been added successfully');
    }


    public function show(string $id)
    {
        $subscription = EnterpriseSubscription::with('copones')->findOrFail($id);
        $actives = EnterpriseCopone::whereHas('user')->whereBelongsTo($subscription)->get();
        $InActives = EnterpriseCopone::whereDoesntHave('user')->whereBelongsTo($subscription)->get();
        return view('admin.enterprises.show',compact('subscription','actives','InActives'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subscription = EnterpriseSubscription::findOrFail($id);
        return view('admin.enterprises.edit',compact('subscription'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EnterpriseSubscriptionRequest $request, string $id)
    {

        $subscription = EnterpriseSubscription::findOrFail($id);

        if ($request->status==1&&$subscription->status==0) {
            $request['date_of_activation'] = Carbon::now();
        }
        $subscription->update($request->all());

        return redirect()->route('admin.enterprises.index')
                        ->with('success','Entrprise subscription has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        EnterpriseSubscription::findOrFail($request->id)->delete();
        return redirect()->route('admin.enterprises.index')->with('success','Entrprise subscription has been removed successfully');
    }
}
