<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TwilioService;

class WhatsAppController extends Controller
{
    protected $twilioService;

    public function __construct(TwilioService $twilioService)
    {
        $this->twilioService = $twilioService;
    }

    public function sendMessage(Request $request)
    {
        $recipient = $request->input('recipient'); // Expected format: +1234567890
        $message = $request->input('message');

        if ($this->twilioService->sendWhatsAppMessage($recipient, $message)) {
            return response()->json(['status' => 'Message sent successfully']);
        } else {
            return response()->json(['status' => 'Failed to send message'], 500);
        }
    }
}
