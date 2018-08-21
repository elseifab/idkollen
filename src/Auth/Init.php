<?php

namespace ElseifAB\IDKollen\Auth;

use ElseifAB\IDKollen\API\ApiKeyManager;

class Init
{
    public static function boot(\WP_REST_Request $request)
    {
        $socialSecurityNumber = $request->get_param('pno');

        if (!Validate::socialSecurityNumber($socialSecurityNumber)) {
            return Responses::notValidSocial($socialSecurityNumber);
        }

        $init = new static();

        $waitKey = uniqid('idkollen');

        $reply = $init->callInit($socialSecurityNumber, $waitKey);

        if (is_wp_error($reply)) {
            Responses::initError($reply);
        }

        $result = Wait::loop($waitKey);

        if (!$result) {
            return Responses::clientTimeout();
        }

        return Responses::success($result);
    }

    /**
     * @param $socialSecurityNumber
     * @return array|\WP_Error
     */
    private function callInit($socialSecurityNumber, $waitKey)
    {
        $apiKey = ApiKeyManager::get();

        $body = [
            "itemId" => $waitKey,
            "itemDescription" => "Testing login Handelstrender",
            "pno" => $socialSecurityNumber,
            "callbackUrl" => rest_url(Paths::MAIN_URL . '/callback'),
        ];

        return wp_remote_post("https://liveapi03.idkollen.se/api/seal-service/{$apiKey}/sign-item", [
                'method' => 'POST',
                'timeout' => 10,
                'headers' => [
                    'content-type' => 'application/json'
                ],
                'body' => json_encode($body),
            ]
        );
    }
}
