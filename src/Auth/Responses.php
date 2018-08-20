<?php

namespace ElseifAB\IDKollen\Auth;

use ElseifAB\IDKollen\Settings\Timeout;

class Responses
{

    public static function notValidSocial($socialSecurityNumber)
    {
        $response = new \WP_REST_Response([
            "error" => "INVALID_PARAMETER",
            "pno" => $socialSecurityNumber,
            "message" => "Must validate to format (19/20)YYMMDD-NNNN",
        ], 400);
        return $response;
    }

    public static function initError($remoteReply)
    {
        $response = new \WP_REST_Response([
            "result" => "INITIAL_ERROR",
            'errors' => $remoteReply->get_error_messages(),
            'data' => $remoteReply->get_error_data(),
        ], $remoteReply->get_error_code());
        return $response;
    }

    public static function clientTimeout()
    {
        $timeout = Timeout::get();
        $response = new \WP_REST_Response([
            "result" => "TIMEOUT_ERROR",
            "message" => "Timeout, waited over set timeout {$timeout} seconds.",
        ], 423);
        return $response;
    }

    public static function success($token) {
        $response = new \WP_REST_Response([
            "token" => $token,
            "result" => "success",
        ], 200);
        return $response;
    }

}
