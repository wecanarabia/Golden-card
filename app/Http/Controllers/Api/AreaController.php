<?php

namespace App\Http\Controllers\Api;

use App\Models\Area;
use GuzzleHttp\Client;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Requests\AreaRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\AreaResource;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ApiController;
use GuzzleHttp\Exception\RequestException;


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
            // $to = $request->input('to');
            // $data['message']='fdfdf';
            // $data['to']=$to;
            // Mail::to($to)->send(new SendEmail($data));
            // return 'Email sent successfully!';
        $client = new Client();
        $response = $client->request('POST', 'https://api.mailbaby.net/mail/send', [
            'headers' => [
                'Content-Type' => 'application/json',
                'X-API-KEY' => 'MzyHBztKvrilFFmuPISEzstsllmphd79adpSI37J5hRWR2c9gEHA5yWsAlNAuvu8r1h3YWEvsbHe32xGxj5PJnW1wXH7cjTvZOf9BiBmTSpjLWFzhMgZWqFMuJPHeiri',
            ],
            'json' => [
                'to' => $request->to,
                'from' => "info@wecan.work",
                'username' => "mb42038",
                'password' => "nDuvN9WChTvbUaBSEXyC",
                'subject' => "test",
                'body' => "welcome",
                'port' => 25,
                'transport' => 'smtp',
                'host' => 'relay.mailbaby.net',
                'encryption' => 'ssl',
            ],
        ]);
        return $response->getBody();
    } catch (RequestException $e) {
        // Handle errors
        $response = $e->getResponse();
        $statusCode = $response->getStatusCode();
        $reasonPhrase = $response->getReasonPhrase();
        // Log or return the error message
        return "Error: $statusCode - $reasonPhrase";
    }
    }


}
