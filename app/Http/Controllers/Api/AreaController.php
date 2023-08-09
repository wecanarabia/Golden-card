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
            // $to = $request->input('to');
            // $data['message']='fdfdf';
            // $data['to']=$to;
            // Mail::to($to)->send(new SendEmail($data));
            // return 'Email sent successfully!';
            $client = new \GuzzleHttp\Client();

            $response = $client->request('POST', 'https://api.eu.mailgun.net/v3/goldencard.com.jo/messages', [
            'auth' => ['api', env('MAILGUN_SECRET')],
                'form_params' => [
                    'from' => 'Golden Card <goldencard@goldencard.com.jo>',
                    'to' => $request->to,
                    'subject' => 'test',
                    'text' => 'welcome',
                ],
            ]);


            return $response->getBody();
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            // handle the exception here
            return $e->getMessage();
        }

    }

//     public function sendEmail(Request $request)
// {
//     try {
//         $client = new \GuzzleHttp\Client();
//         $response = $client->request('POST', 'https://api.mailgun.net/v3/sandboxe385e0cd2633454e8de66f2503ad5e69.mailgun.org/messages', [
//             'auth' => ['api_key', '6d8d428c-e428748f'],
//             'multipart' => [
//                 [
//                     'name' => 'from',
//                     'contents' => 'Golden Card <Goldencardjo@gmail.com>',
//                 ],
//                 [
//                     'name' => 'to',
//                     'contents' => $request->to,
//                 ],
//                 [
//                     'name' => 'subject',
//                     'contents' => 'test',
//                 ],
//                 [
//                     'name' => 'text',
//                     'contents' => 'welcome',
//                 ],
//             ],
//         ]);
//         if ($response->getStatusCode() === 200) {
//             return response()->json(['message' => 'Email sent successfully']);
//         } else {
//             return response()->json(['error' => 'Failed to send email'], $response->getStatusCode());
//         }
//     } catch (\GuzzleHttp\Exception\RequestException $e) {
//         $statusCode = $e->getResponse()->getStatusCode();
//         $reasonPhrase = $e->getResponse()->getReasonPhrase();
//         return response()->json(['error' => "Error: $statusCode - $reasonPhrase"], $statusCode);
//     }
// }



}
