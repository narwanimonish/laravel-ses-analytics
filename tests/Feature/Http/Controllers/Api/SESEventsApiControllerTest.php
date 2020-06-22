<?php

namespace Narwanimonish\SESEvents\Tests\Feature\Http\Controllers\Api;

use Illuminate\Support\Facades\File;
use Narwanimonish\SESEvents\Tests\TestCase;

class SESEventsControllerApiTests extends TestCase
{
    /** @test */
    public function webhook_calls_to_subscribe_url()
    {
        $subscriptionPayload = (array) json_decode(File::get(__DIR__ . "/subscribe.json"));

        $this->post('/ses_events/events-webhook', $subscriptionPayload);
        // $this->post('/ses_events/events-we   bhook', ['monish', 'narwani']);
        $this->assertTrue(true);
    }

    /** @test */
    public function testing_api_calls()
    {
        $this->post('/ses_events/test');
    }
}
