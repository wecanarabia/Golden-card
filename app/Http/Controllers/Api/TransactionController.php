<?php

namespace App\Http\Controllers\Api;

use App\Models\Transaction;
use App\Models\Subscription;
use App\Models\EnterpriseCopone;
use App\Models\User;
use App\Models\Plan;
use App\Models\PromoCode;
use App\Models\UserCode;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Requests\TransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Http\Resources\PromocodeResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class TransactionController extends ApiController
{
    public function __construct()
    {
        $this->resource = TransactionResource::class;
        $this->model = app(Transaction::class);
        $this->repositry =  new Repository($this->model);
    }

    // public function save( Request $request ){
    //     $request['transaction_id'] = $request->id;
    //     return $this->store( $request->except('id') );



    // }

    // public function save( Request $request ){
    //     $request['transaction_id'] = $request->id;


    //     $order_number=$request->order_number;
    //     $array=explode("_",$order_number);
    //     // echo $array[4];


    //     if($array[4] != 0){

    //         $coupon = Coupons::find($array[4]);
    //         if( $coupon->discount_type =="count" && $coupon->status=='1')
    //         {


    //             if($coupon->count > 0)
    //             {

    //             $coupon->count=$coupon->count-1;
    //             $coupon->save();

    //             $doctor=new UserCoupon();
    //             $doctor->user_id=$array[0];
    //             $doctor->coupon_id=$array[4];
    //             $doctor->save();

    //             if($coupon->count==0){

    //                 $coupon->status=0;
    //                 $coupon->save();
    //             }

    //             }


    //         }

    //         if( $coupon->discount_type =="date" && $coupon->status=='1')
    //         {

    //             $date = today()->format('Y-m-d');
    //             if($date > $coupon->end_date){

    //                 $coupon->status=0;
    //                 $coupon->save();
    //             }



    //             if($date <= $coupon->end_date)
    //             {

    //                 $doctor=new UserCoupon();
    //                 $doctor->user_id=$array[0];
    //                 $doctor->coupon_id=$array[4];
    //                 $doctor->save();

    //             }

    //         }

    //     }

    //     return $this->store( $request->except('id') );



    // }


    public function save( Request $request ){

        $request['transaction_id'] = $request->id;
        // $trans=Transaction::create( $request->except('id'));


        $order_number=$request->order_number;
        $array=explode("_",$order_number);
        // echo $array[4];

        if($request->status=="success" && $request->type=="sale"){



            if($array[4] != 0){


                    $today = today()->format('Y-m-d');
                    $code=PromoCode::where('code',$array[4])->first();
                    if($code){
                        if($today <= $code->end_date && $today >= $code->start_date && $code->status == 1)
                        {

                            $user_code=UserCode::where('promo_code_id',$code->id)->count();
                            if($user_code < $code->num_of_users)
                            {
                                if($code->type == "fixed")
                                {


                                    $plan=Plan::find($array[1]);
                                    $price= $plan->price - $code->value;

                                    $sub=new Subscription();
                                    $sub->start_date = $array[2];
                                    $sub->end_date = $array[3];
                                    $sub->user_id = $array[0];
                                    $sub->plan_id = $array[1];
                                    $sub->value = $price ;
                                    $sub->subable_type =get_class(app(PromoCode::class));
                                    $sub->subable_id= $code->id;
                                    $sub->order_number=$order_number;
                                    $sub->save();

                                    $us_code=new UserCode();
                                    $us_code->promo_code_id = $code->id;
                                    $us_code->subscription_id = $sub->id;
                                    $us_code->save();



                                    return $this->store( $request->except('id') );
                                    // return $this->returnSuccessMessage($price);
                                    // return $this->returnData( 'data' , new $this->resource( $sub ), __('Succesfully'));


                                }

                                if($code->type == "percentage")
                                {



                                    $plan=Plan::find($array[1]);
                                    // $price= $plan->price - $code->value;

                                    $discount = $plan->price * ($code->value / 100);
                                    $price = $plan->price - $discount;

                                    $sub=new Subscription();
                                    $sub->start_date = $array[2];
                                    $sub->end_date = $array[3];
                                    $sub->user_id = $array[0];
                                    $sub->plan_id = $array[1];
                                    $sub->value = $price ;
                                    $sub->subable_type =get_class(app(PromoCode::class));
                                    $sub->subable_id= $code->id;
                                    $sub->order_number=$order_number;
                                    $sub->save();

                                    $us_code=new UserCode();
                                    $us_code->promo_code_id = $code->id;
                                    $us_code->subscription_id = $sub->id;
                                    $us_code->save();

                                    return $this->store( $request->except('id') );

                                    // return $this->returnSuccessMessage($price);
                                    // return $this->returnData( 'data' , new $this->resource( $sub ), __('Succesfully'));

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

        }


        if($array[4] == 0){



                $plan=Plan::find($array[1]);


                               $sub=new Subscription();
                                $sub->start_date = $array[2];
                                $sub->end_date = $array[3];
                                $sub->user_id = $array[0];
                                $sub->plan_id = $array[1];
                                $sub->value = $plan->price ;
                                $sub->subable_type =get_class(app(PromoCode::class));
                                $sub->subable_id= 0;
                                $sub->order_number=$order_number;
                                $sub->save();

                                // return $this->returnSuccessMessage('success');
                                // return $this->returnData( 'data' , new $this->resource( $sub ), __('Succesfully'));

                                return $this->store( $request->except('id') );
        }







    }



    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }

    public function viewTrans($order_number)
    {
        $model = Transaction::where('order_number',$order_number)->first();

        if ($model) {
            return $this->returnData('data', new $this->resource( $model ), __('Get  succesfully'));
        }

        return $this->returnError(__('Sorry! Failed to get !'));
    }

    public function deleteTrans($order_number)
    {
        $model = Transaction::where('order_number',$order_number)->first();

        if (!$model) {
            return $this->returnError(__('Sorry! Failed to get !'));
        }


        $model->delete();
        return $this->returnSuccessMessage(__('Delete succesfully!'));
    }


    public function viewCopon(Request $request)
    {

    $code=PromoCode::where('code', $request->code)->first();

        $today = today()->format('Y-m-d');

        if($code){
            if($today <= $code->end_date && $today >= $code->start_date && $code->status == 1)
            {

                $user_code=UserCode::where('promo_code_id',$code->id)->count();
                if($user_code < $code->num_of_users)
                {
                    if($code->type == "fixed")
                    {


                        $plan=Plan::find($request->plan_id);
                        $price= $plan->price - $code->value;;


                        return $this->returnSuccessMessage($price);



                    }

                    if($code->type == "percentage")
                    {


                        $plan=Plan::find($request->plan_id);
                        // $price= $plan->price - $code->value;

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


}
