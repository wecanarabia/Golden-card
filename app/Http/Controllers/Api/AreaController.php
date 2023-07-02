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
use \Swift_Mailer;
use \Swift_Message;
use \Swift_SmtpTransport;


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


    // public function sendEmail(Request $request)
    // {
    //     try {

    //         $api_key = $request->header('MzyHBztKvrilFFmuPISEzstsllmphd79adpSI37J5hRWR2c9gEHA5yWsAlNAuvu8r1h3YWEvsbHe32xGxj5PJnW1wXH7cjTvZOf9BiBmTSpjLWFzhMgZWqFMuJPHeiri');

    //         // Create the transport
    //         $transport = new Swift_SmtpTransport('relay.mailbaby.net', 587, 'tls');
    //         $transport->setUsername('mb42038');
    //         $transport->setPassword('nDuvN9WChTvbUaBSEXyC');

    //         // Create the mailer using the transport
    //         $mailer = new Swift_Mailer($transport);

    //         // Create the message
    //         $message = new Swift_Message();
    //         $message->setSubject('Test Email');
    //         $message->setFrom(['wecan@gmail.com' => $request->from_name]);
    //         $message->setTo([$request->to => $request->to_name]);
    //         $message->setBody('welcome');

    //         // Send the message
    //         $result = $mailer->send($message);

    //         // Check if the message was sent successfully
    //         if ($result) {
    //             return response()->json(['status' => 'success', 'message' => 'Email sent successfully.']);
    //         } else {
    //             return response()->json(['status' => 'error', 'message' => 'Error sending email.']);
    //         }
    //     } catch (\Exception $e) {
    //         return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
    //     }
    // }

}
