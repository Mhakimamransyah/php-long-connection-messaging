<?php

namespace Consumer\controllers;

use Bunny\Async\Client;
use Bunny\Message;
use Bunny\Channel;
use Business\submission\ports\SubmissionService;

class NotificationBacklogsController {
    
    private SubmissionService $submissionServices;

    function __construct(SubmissionService &$submissionServices) {
        $this->submissionServices = $submissionServices;
    }

    public function invoke(Channel $channel) {
        $channel->consume(
            function (Message $message, Channel $channel, Client $client) {
                
                $payment = (array) json_decode($message->content);
                $results = $this->submissionServices->submit($payment);
    
                $channel->ack($message);
            },
            NOTIFICATIONS_BACKLOG_QUEUE
        );
    }

}