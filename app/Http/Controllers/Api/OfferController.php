<?php

namespace App\Http\Controllers\Api;

use App\Models\Offer;
use App\Models\Service;
use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Resources\OfferResource;
use App\Http\Resources\BranchResource;
use App\Http\Resources\VoucherResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class OfferController extends ApiController
{
    public function __construct()
    {
        $this->resource = OfferResource::class;
        $this->model = app(Offer::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        $offer = $this->repositry->getByID($id);

        if ($offer) {
          $code=Service::where('code',$request->code)->first();

          if($code){

            // $offer = $this->repositry->edit( $id,$request->all() );

            $today = today()->format('Y-m-d');
            $user_uses=Voucher::where('offer_id', $offer->id)->where('user_id',Auth::user()->id)->count();

           if($today <= $offer->end_date && $user_uses < $offer->use_times &&  $offer->status == 1)
            {

             $randomCode = Str::random(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
              $voucher=new Voucher();
              $voucher->code = $randomCode;
              $voucher->offer_id = $offer->id;
              $voucher->user_id = Auth::user()->id;
              $voucher->branch_id = $request->branch_id;
              $voucher->save();

           return $this->returnData('data', new VoucherResource( $voucher ), __('Updated succesfully'));
            }


            $offer->update([
                'status' => 0 ,
            ]);

            return $this->returnError(__('Sorry! The offer time has expired or you have used up the allowed times !'));
          }
          return $this->returnError(__('Sorry! Code not correct !'));

        }

        return $this->returnError(__('Sorry! Failed to get !'));

    }

    public function branchesOfOffer($id)
    {

        $bran = Offer::find($id)->branches;

        return $this->returnData('data',  BranchResource::collection( $bran ), __('Get  succesfully'));

    }

    public function myOffers()
    {

        $offers = Auth::user()->offers;
        return $this->returnData('data',  OfferResource::collection( $offers ), __('Get  succesfully'));

    }

    public function myVouchers()
    {

        $vouchers = Auth::user()->vouchers;
        return $this->returnData('data',  VoucherResource::collection( $vouchers ), __('Get  succesfully'));

    }

    public function getVoucherOfUserByOffer($id)
    {

        $vouchers = Voucher::where('user_id',Auth::user()->id)->where('offer_id',$id)->get();

        return $this->returnData('data',  VoucherResource::collection( $vouchers ), __('Get  succesfully'));

    }

}
