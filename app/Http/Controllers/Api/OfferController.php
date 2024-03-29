<?php

namespace App\Http\Controllers\Api;

use App\Models\Offer;
use App\Models\Service;
use App\Models\Branch;
use App\Models\Voucher;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Resources\OfferResource;
use App\Http\Resources\BranchResource;
use App\Http\Resources\VoucherResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;


class OfferController extends ApiController
{
    public function __construct()
    {
        $this->resource = OfferResource::class;
        $this->model = app(Offer::class);
        $this->repositry =  new Repository($this->model);
    }



    public function list(){


        $data=Offer::where('status',1)->get();
        return $this->returnData('data',  OfferResource::collection( $data ), __('Get  succesfully'));

       }

       public function offers(){


        $data=Offer::where('status',1)->get();
        return $this->returnData('data',  OfferResource::collection( $data ), __('Get  succesfully'));

       }


    public function save( Request $request ){
        return $this->store( $request->all() );
    }


    // public function sendEmail($to,$code,$dis,$date)
    // {
    //     // dd('hi');
    //     try {
    //         // $to = $request->input('to');
    //         // $data['message']='fdfdf';
    //         // $data['to']=$to;
    //         // Mail::to($to)->send(new SendEmail($data));
    //         // return 'Email sent successfully!';
    //         $client = new \GuzzleHttp\Client();

    //         $tableStyle = 'border-collapse: collapse; width: 100%;';
    //         $headerCellStyle = 'background-color: goldenrod; color: white; text-align: left; padding: 8px;';
    //         $cellStyle = 'border: 1px solid goldenrod; padding: 8px;';
    //         $rowStyle = 'border-bottom: 1px solid goldenrod;';

    //         $table = '<table style="' . $tableStyle . '">';
    //         $table .= '<tr><th style="' . $headerCellStyle . '">Discount Code</th><th style="' . $headerCellStyle . '">Discount Value</th><th style="' . $headerCellStyle . '">Used Date</th></tr>';
    //         $table .= '<tr style="' . $rowStyle . '"><td style="' . $cellStyle . '">' . $code . '</td><td style="' . $cellStyle . '">' . $dis . '</td><td style="' . $cellStyle . '">' . $date . '</td></tr>';
    //         $table .= '</table>';

    //             $response = $client->request('POST', 'https://api.eu.mailgun.net/v3/goldencard.com.jo/messages', [
    //                 'auth' => ['api', env('MAILGUN_SECRET')],
    //                 'form_params' => [
    //                     'from' => 'Golden Card <goldencard@goldencard.com.jo>',
    //                     'to' => $to,
    //                     'subject' => 'Code',
    //                     'html' => '<p>Your discount details:</p>' . $table,
    //                 ],
    //             ]);



    //     } catch (\GuzzleHttp\Exception\ClientException $e) {
    //         // handle the exception here
    //         return $e->getMessage();
    //     }

    // }

    public function sendEmail($to, $name, $lname, $service, $branch, $desc, $oname, $code, $dis, $date)
    {
        try {
            $client = new \GuzzleHttp\Client();

            $tableStyle = 'border-collapse: collapse; width: 100%;';
            $headerCellStyle = 'background-color: goldenrod; color: white; text-align: left; padding: 8px;';
            $cellStyle = 'border: 1px solid goldenrod; padding: 8px;';
            $rowStyle = 'border-bottom: 1px solid goldenrod;';

            $table = '<table style="' . $tableStyle . '">';
            $table .= '<tr><th style="' . $headerCellStyle . '">Voucher Name</th><th style="' . $headerCellStyle . '">Merchant</th><th style="' . $headerCellStyle . '">Description</th><th style="' . $headerCellStyle . '">Save Amount</th></tr>';
            $table .= '<tr style="' . $rowStyle . '"><td style="' . $cellStyle . '">' . $oname . '</td><td style="' . $cellStyle . '">' . $service . '</td><td style="' . $cellStyle . '">' . $desc . '</td><td style="' . $cellStyle . '">' . $dis . '</td></tr>';
            $table .= '</table>';

            $content = '<p>Dear ' . $name . ' ' . $lname . ',<br>The Voucher was redeemed at ' . $date . ' at ' . $service . ' - ' . $branch . '<br>With the code: ' . $code . '</p>' . $table;
            $content .= '<p>Golden Card</p>';

            $response = $client->request('POST', 'https://api.eu.mailgun.net/v3/goldencard.com.jo/messages', [
                'auth' => ['api', env('MAILGUN_SECRET')],
                'form_params' => [
                    'from' => 'Golden Card <goldencard@goldencard.com.jo>',
                    'to' => $to,
                    'subject' => 'Code',
                    'html' => $content,
                ],
            ]);

            // Add a success message if needed
            // return 'Email sent successfully!';

        } catch (\GuzzleHttp\Exception\ClientException $e) {
            // handle the exception here
            return $e->getMessage();
        }
    }

    public function edit($id,Request $request){


        $offer = $this->repositry->getByID($id);

        if ($offer) {

          $branch=Branch::find($request->branch_id)->service?->id;
          $code=Service::where('id',$branch)->where('code',$request->code)->first();

            // $code=Service::where('code',$request->code)->first();

          if($code){

            // $offer = $this->repositry->edit( $id,$request->all() );

            $today = today()->format('Y-m-d');
            $user_uses=Voucher::where('offer_id', $offer->id)->where('user_id',Auth::user()->id)->count();

           if($today <= $offer->end_date && $user_uses < $offer->use_times &&  $offer->status == 1)
            {

                $randomCode = strtoupper(substr(str_shuffle(str_repeat('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', 6)), 0, 6));
              $voucher=new Voucher();
              $voucher->code = $randomCode;
              $voucher->offer_id = $offer->id;
              $voucher->user_id = Auth::user()->id;
              $voucher->branch_id = $request->branch_id;
              $voucher->save();

              $this->sendEmail(Auth::user()->email,Auth::user()->first_name,Auth::user()->last_name,Branch::find($request->branch_id)->service?->name,Branch::find($request->branch_id)->name,$offer->description,$offer->name,$voucher->code,$offer->discount_value,$voucher->created_at);

           return $this->returnData('data', new VoucherResource( $voucher ), __('Updated succesfully'));
            }


            if($today > $offer->end_date)
            {
            $offer->update([
                'status' => 0 ,
            ]);

            }

            return $this->returnError(__('Sorry! The offer time has expired or you have used up the allowed times !'));
          }
          return $this->returnError(__('Sorry! Code not correct !'));

        }

        return $this->returnError(__('Sorry! Failed to get !'));

    }

    public function branchesOfOffer($id)
    {

        $bran = Offer::whereStatus(1)->find($id)->branches;

        return $this->returnData('data',  BranchResource::collection( $bran ), __('Get  succesfully'));

    }


    // public function getOffersByBranch($id)
    // {

    //     $offers = Branch::find($id)->offers;

    //     return $this->returnData('data',  OfferResource::collection( $offers ), __('Get  succesfully'));

    // }



    public function getOffersByBranch($id)
{
    $offers = Offer::whereHas('branches',function($q)use($id){$q->where('branch_id', $id);})
                   ->where('status', 1)
                   ->get();

    return $this->returnData('data', OfferResource::collection($offers), __('Get successfully'));
}

    public function myOffers()
    {

        $offers = Auth::user()->paginationoffers();
        return $this->returnData('data',  OfferResource::collection( $offers ), __('Get  succesfully'));

    }

    public function myVouchers()
    {

        $vouchers = Auth::user()->paginationvouchers();
        return $this->returnData('data',  VoucherResource::collection( $vouchers ), __('Get  succesfully'));

    }

    public function getVoucherOfUserByOffer($id)
    {

        $vouchers = Voucher::where('user_id',Auth::user()->id)->where('offer_id',$id)->get();

        return $this->returnData('data',  VoucherResource::collection( $vouchers ), __('Get  succesfully'));

    }

    public function isFav(Request $request){


        $favorite = Favorite::where('user_id',$request->user_id)->where('offer_id',$request->offer_id)->first();
            if($favorite){
                return $this->returnSuccessMessage('true');
            }
            return $this->returnError('false');
    }



    public function countUsesOfUser(Request $request){


         $count=Voucher::where('user_id',$request->user_id)->where('offer_id',$request->offer_id)->count();
         return $this->returnSuccessMessage($count);
    }

}
