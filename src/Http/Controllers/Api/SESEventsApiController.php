<?php

namespace Narwanimonish\SESEvents\Http\Controllers\Api;

use Aws\Sns\Exception\InvalidSnsMessageException;
use Aws\Sns\Message;
use Aws\Sns\MessageValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class SESEventsApiController
{
    public function eventWebhook(Request $request)
    {
        $message = Message::fromRawPostData();
        $validator = new MessageValidator();

        try {
            $validator->validate($message);
        } catch (InvalidSnsMessageException $e) {
            logger($e->getMessage());
            die;
        }

        if ($message['Type'] === 'SubscriptionConfirmation') {
            // Confirm the subscription by sending a GET request to the SubscribeURL
            Http::get($message['SubscribeURL']);

            return;
        }

        $snsData = json_decode($message->toArray()['Message'], true);

        $postData = Validator::make($snsData, [
            'eventType' => ['required'],
            'mail.messageId' => ['required'],
            'mail.source' => ['required'],
            'mail.headers' => ['required'],
        ]);

        if ($postData->fails()) {
            return response()->json($postData->errors(), 422);
        }
    }
}
