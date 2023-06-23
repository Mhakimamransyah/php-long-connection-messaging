<?php

namespace Api\v1\approval\response;

use \React\Http\Message\Response;

trait ApprovePaymentResponse{

    function successApproveResponse(int $id) {
        
        $response = new Response(Response::STATUS_CREATED);
        return $response::json([
            "messages"  => "Data created",
            "data"      => [
                "id"    => $id
            ]
        ]);
    }

    function failedApproveResponse(?int $id) {
        $response = new Response(Response::STATUS_INTERNAL_SERVER_ERROR);
        return $response::json([
            "messages"  => "Failed while creating data",
            "data"      => [
                "id"    => $id
            ]
        ]);
    }

}