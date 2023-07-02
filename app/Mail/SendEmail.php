<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Headers;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;


class SendEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;


    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }


    public function build()
    {
        // $subject = 'Email from Laravel API';
        // return $this->view('emails.send_email')
        //             ->subject($subject)
        //             ->with('data', $this->data);

        // $to = $this->viewData['to'];
        // $name = $this->viewData['name'];
        $payload = [
            'to' => $this->data['to'],
            // 'name' => $name,
            'subject' => $this->subject,
            'message' => $this->view,

        ];

        $url = 'https://api.mailbaby.net/mail/send';

        $headers = [
            'Content-Type: application/json',
            'x-api-key: MzyHBztKvrilFFmuPISEzstsllmphd79adpSI37J5hRWR2c9gEHA5yWsAlNAuvu8r1h3YWEvsbHe32xGxj5PJnW1wXH7cjTvZOf9BiBmTSpjLWFzhMgZWqFMuJPHeiri',
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        return $this->from('info@wecan.jo')->view('emails.send_email')
        ->with('data', $this->data);
    }
}
