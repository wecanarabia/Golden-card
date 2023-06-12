<?php

namespace App\Http\Controllers\Api;

use App\Models\Subscription;
use App\Models\EnterpriseCopone;
use App\Models\User;
use App\Models\Plan;
use App\Models\PromoCode;
use App\Models\UserCode;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Requests\SubscriptionRequest;
use App\Http\Resources\SubscriptionResource;
use App\Http\Resources\MySubscriptionResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Auth;

class SubscriptionController extends ApiController
{
    public function __construct()
    {
        $this->resource = SubscriptionResource::class;
        $this->model = app(Subscription::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){

        //يوجد كوبون خصم
        if ($request->copon == 1) {

            $today = today()->format('Y-m-d');
            $code=PromoCode::where('code',$request->code)->first();
            if($code){
                if($today <= $code->end_date && $today >= $code->start_date )
                {

                    $user_code=UserCode::where('promo_code_id',$code->id)->count();
                    if($user_code < $code->num_of_users)
                    {
                        if($code->type == "fixed"){

                            $sub=new Subscription();
                            $sub->start_date = $request->start_date;
                            $sub->end_date = $request->end_date;
                            $sub->user_id = $request->user_id;
                            $sub->plan_id = $request->plan_id;
                            $sub->save();

                            $us_code=new UserCode();
                            $us_code->promo_code_id = $code->id;
                            $us_code->subscription_id = $sub->id;
                            $us_code->save();

                            $plan=Plan::find($request->plan_id);
                            $price= $plan->price - $code->value;


                            return $this->returnSuccessMessage($price);


                        }

                        if($code->type == "percentage"){

                            $sub=new Subscription();
                            $sub->start_date = $request->start_date;
                            $sub->end_date = $request->end_date;
                            $sub->user_id = $request->user_id;
                            $sub->plan_id = $request->plan_id;
                            $sub->save();

                            $us_code=new UserCode();
                            $us_code->promo_code_id = $code->id;
                            $us_code->subscription_id = $sub->id;
                            $us_code->save();

                            $plan=Plan::find($request->plan_id);
                            $price= $plan->price - $code->value;

                            $discount = $plan->price * ($code->value / 100);
                            $price = $plan->price - $discount;

                            return $this->returnSuccessMessage($price);

                        }

                    }

                    $code->update([
                        'status' => 0,
                    ]);
            return $this->returnError('Soory ! The number of times this coupon has been used has expired!');
                }

                $code->update([
                    'status' => 0,
                ]);
            return $this->returnError('Soory ! Coupon date has expired or not start yet!');

            }
       return $this->returnError('Soory ! code not correct!');
        }

         //بدون كوبون
        if ($request->copon == 0){
        return $this->store( $request->except('copon') );
        }
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }

    public function mySubscription($user_id){


       // $user_id = Auth::user()->id;
        // $user=User::find($user_id)->first();
        $subscriptions = Subscription::where('user_id',$user_id)->paginate(10) ;
        return $this->returnData('data',  MySubscriptionResource::collection( $subscriptions ), __('Get  succesfully'));

    }


    public function getFreeSub(Request $request){

    $today = today()->format('Y-m-d');
    $copon= EnterpriseCopone::where('code',$request->code)->first();

    if($copon){

    if($copon->user_id == null)
    {

        if($today <= $copon->enterprise?->end_date && $today >= $copon->enterprise?->start_date)
        {
        $copon->update([
            'user_id' => Auth::user()->id,
        ]);

        $sub=new Subscription();
        $sub->start_date = $copon->enterprise->start_date;
        $sub->end_date = $copon->enterprise->end_date;
        $sub->user_id = Auth::user()->id;
        $sub->plan_id = 1 ;
        $sub->save();

        return $this->returnSuccessMessage('success');
    }
    return $this->returnError('Soory ! Coupon date has expired!');

    }

    return $this->returnError('Soory ! this code is used!');
    }
    return $this->returnError('Soory ! code not correct!');
}


}
