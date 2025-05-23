<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TwilioService;
use Twilio\Rest\Client;

class WhatsAppController extends Controller
{
    protected $twilioService;

    public function __construct(TwilioService $twilioService)
    {
        $this->twilioService = $twilioService;
    }

    public function sendMessage(Request $request)
    {
        // dd($request->all());
        $account_sid = env('TWILIO_SID');  // Your Twilio SID
        $auth_token = env('TWILIO_AUTH_TOKEN');  // Your Twilio Auth Token
        $twilio_number = env('TWILIO_WHATSAPP_NUMBER');  // Your Twilio WhatsApp Number

        $client = new Client($account_sid, $auth_token);

        $recipient = $request->input('number');
        // $recipient = '+8801686844781'; 
        $message = 'very happy to send sandbox account';

        try {
            $client->messages->create(
                "whatsapp:".$recipient,  // to Recipient's WhatsApp number
                [
                    'from' => $twilio_number,
                    'body' => $message
                ]
            );
            return response()->json(['status' => 'Message sent successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'Failed to send message', 'error' => $e->getMessage()], 500);
        }
    }

}
