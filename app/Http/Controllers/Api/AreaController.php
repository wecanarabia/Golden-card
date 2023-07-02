<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\Models\Area;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Requests\AreaRequest;
use App\Http\Resources\AreaResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use GuzzleHttp\Client;


class AreaController extends ApiController
{

    public function __construct()
    {
        $this->resource = AreaResource::class;
        $this->model = app(Area::class);
        $this->repositry =  new Repository($this->model);
    }

    public function areas()
    {

        $data = Area::orderBy('order','asc')->get();

        return $this->returnData( 'data' , $this->resource::collection( $data ), __('Succesfully'));


    }


    public function save( Request $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }



    // public function sendEmail(Request $request)
    // {
    //     // dd('hi');
    //     $data = [
    //         'message' => $request->message
    //     ];

    //     Mail::to($request->email)->send(new SendEmail($data));

    //     return $this->returnSuccessMessage('success');
    // }

      public function sendEmail(Request $request)
    {
        // dd('hi');
        try{
        $client = new Client();
        $response = $client->request('POST', 'https://api.mailbaby.net/mail/send', [
            'headers' => [
                'Content-Type' => 'application/json',
                'X-API-KEY' => 'MzyHBztKvrilFFmuPISEzstsllmphd79adpSI37J5hRWR2c9gEHA5yWsAlNAuvu8r1h3YWEvsbHe32xGxj5PJnW1wXH7cjTvZOf9BiBmTSpjLWFzhMgZWqFMuJPHeiri',
            ],
            'json' => [
                'to' => $request->to,
                'from' => "wecan@gmail.com",
                'subject' => "test",
                'body' => "welcome",
            ],
        ]);
        return $response->getBody();
    }
    catch (\Exception $e) {
        dd("hi");


    }
    }


}
