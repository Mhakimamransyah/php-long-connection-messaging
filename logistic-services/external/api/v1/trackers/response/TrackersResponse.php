<?php

namespace Api\v1\trackers\response;

use \React\Http\Message\Response;

trait TrackersResponse{

    function successUpdate(array $data) {
        
        $response = new Response(Response::STATUS_OK);
        return $response::json([
            "messages"  => "Data updated",
            "data"      => $data
        ]);
    }

    function failedUpdate(array $data) {
        $response = new Response(Response::STATUS_INTERNAL_SERVER_ERROR);
        return $response::json([
            "messages"  => "Failed while update data",
            "data"      => $data
        ]);
    }

}