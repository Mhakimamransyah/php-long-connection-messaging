<?php

namespace Consumer\controllers;

use Bunny\Async\Client;
use Bunny\Message;
use Bunny\Channel;
use Business\submission\ports\SubmissionService;

class PaymentRequesterController {
    
    private SubmissionService $submissionServices;

    function __construct(SubmissionService &$submissionServices) {
        $this->submissionServices = $submissionServices;
    }

    public function invoke(Channel $channel) {
        $channel->consume(
            function (Message $message, Channel $channel, Client $client) {
                
                $results = $this->submissionServices->submit([
                    "messages" => $message->content
                ]);
    
                $channel->ack($message);
            },
            PAYMENT_REQUEST_QUEUE
        );
    }

}