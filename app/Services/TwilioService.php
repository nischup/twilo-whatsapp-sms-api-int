<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
    }

    public function sendWhatsAppMessage($recipient, $message)
    {
        try {
            $this->client->messages->create(
                "whatsapp:{$recipient}", // WhatsApp recipient number
                [
                    'from' => env('TWILIO_WHATSAPP_NUMBER'),
                    'body' => $message
                ]
            );
            return true;
        } catch (\Exception $e) {
            \Log::error("Twilio WhatsApp Message failed: " . $e->getMessage());
            return false;
        }
    }
}
