<?php

namespace ElseifAB\IDKollen\Auth;

use ElseifAB\IDKollen\API\ApiKeyManager;

class Init
{

    public static function boot(\WP_REST_Request $request)
    {
        $pnr = $request->get_param('pnr');

        if (!preg_match("/^(19|20)?[0-9]{6}[- ]?[0-9]{4}$/", $pnr)) {
            $response = new \WP_REST_Response([
                "error" => "INVALID_PARAMETER",
                "pnr" => $pnr,
                "message" => "Must validate to format (19/20)YYMMDD-NNNN",
            ], 400);
            return $response;
        }

        $apiKey = ApiKeyManager::get();

        $body = [
            "itemId" => uniqid(),
            "itemDescription" => "Testing login Handelstrender",
            "pno" => $pnr,
            "callbackUrl" => "https://www.amek.se",
        ];

        $reply = wp_remote_post("https://liveapi03.idkollen.se/api/seal-service/{$apiKey}/sign-item", [
                'method' => 'POST',
                'timeout' => 10,
                'headers' => [
                    'content-type' => 'application/json'
                ],
                'body' => json_encode($body),
            ]
        );

        if($reply->errors) {
            $response = new \WP_REST_Response([
                'errors' => $reply->get_error_messages(),
                'data' => $reply->get_error_data(),
            ], $reply->get_error_code());
            return $response;
        }

        $response = new \WP_REST_Response([
            "pnr" => $pnr,
            "result" => "success",
            "message" => "Waiting for client response from BankID"
        ]);

        return $response;
    }
}
