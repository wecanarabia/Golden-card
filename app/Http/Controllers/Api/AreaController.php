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
// use GuzzleHttp\Client;


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

        $data = Area::orderBy('order', 'asc')->get();

        return $this->returnData('data', $this->resource::collection($data), __('Succesfully'));
    }


    public function save(Request $request)
    {
        return $this->store($request->all());
    }

    public function edit($id, Request $request)
    {


        return $this->update($id, $request->all());
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
        try {
            $to = $request->input('to');
            $data['message']='fdfdf';
            $data['to']=$to;
            Mail::to($to)->send(new SendEmail($data));
            return 'Email sent successfully!';

            // $client = new \GuzzleHttp\Client();
            // $response = $client->request('POST', 'https://api.mailgun.net/v3/sandbox64807dc398b24206867ea8466ba1b306.mailgun.org/messages', [
            //     'auth' => ['api', 'a4a396479f3550d51a7f1537e006fdd3-6d8d428c-e428748f'],
            //     'form_params' => [
            //         'from' => 'Golden Card <info@wecan.work>',
            //         'to' => $request->to,
            //         'subject' => 'test',
            //         'text' => 'welcome',
            //     ],
            // ]);
            // return $response->getBody();
        } catch (RequestException $e) {
            // Handle errors
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();
            $reasonPhrase = $response->getReasonPhrase();
            // Log or return the error message
            return "Error: $statusCode - $reasonPhrase";
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
