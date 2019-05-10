<?php

namespace App\Services;

use Twilio\Rest\Client;

class Twilio
{
    protected $account_sid;

    protected $auth_token;

    protected $messagingServiceSid;

    protected $client;

    /**
     * Create a new instance
     *
     * @return void
     */

    public function __construct()
    {
        $this->account_sid = config('services.twilio.account_sid');

        $this->auth_token = config('services.twilio.auth_token');

        $this->messagingServiceSid = config('services.twilio.messaging_service_sid');

        $this->client = $this->setUp();
    }

    public function setUp()
    {
        $client = new Client($this->account_sid, $this->auth_token);

        return $client;
    }

    public function notify($number, $spoiler)
    {
        $message = $this->client->messages->create($number, [
            'body' => $spoiler,
            'messagingServiceSid' => $this->messagingServiceSid
        ]);

        return $message;
    }
}
    