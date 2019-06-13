<?php

namespace ElseifAB\IDKollen\Auth;

use ElseifAB\IDKollen\API\ApiKeyManager;
use ElseifAB\IDKollen\Settings\Timeout;

class Init
{
    public static function boot(\WP_REST_Request $request)
    {
        $socialSecurityNumber = $request->get_param('pno');
        $mobile = (int)$request->get_param('mobile');

        if ($mobile == 0) {
            if (!Validate::socialSecurityNumber($socialSecurityNumber)) {
                return Responses::notValidSocial($socialSecurityNumber);
            }
        }

        $init = new static();

        $waitKey = uniqid('idkollen');

        $reply = $init->callInit($socialSecurityNumber, $waitKey);

        if (is_wp_error($reply)) {
            Responses::initError($reply);
        }

        $params = isset($reply['body']) ? $reply['body'] : [];
        $token = isset($params['autoStartToken']) ? $params['autoStartToken'] : null;

        $waitUrl = rest_url(Paths::MAIN_URL . '/loop/' . $waitKey);

        if ($mobile) {
            return new \WP_REST_Response([
                "result" => "success",
                'waitUrl' => $waitUrl,
                "openUrl" => "bankid:///?autostarttoken=$token&redirect=",
            ]);
        }

        return self::waitInner($waitUrl);
    }

    public static function wait(\WP_REST_Request $request)
    {
        $params = $request->get_json_params();

        $waitUrl = isset($params['waitUrl']) ? $params['waitUrl'] : null;

        return self::waitInner($waitUrl);
    }

    public static function waitInner($waitUrl)
    {
        $response = wp_remote_get($waitUrl, [
            'timeout' => Timeout::get(),
            'redirection' => 100,
        ]);

        if (is_wp_error($response)) {
            return Responses::clientTimeout();
        }

        return Responses::success($response['body']);
    }

    /**
     * @param $socialSecurityNumber
     * @param $waitKey
     * @return mixed
     */
    private function callInit($socialSecurityNumber, $waitKey)
    {
        $apiKey = ApiKeyManager::get();

        $body = [
            "itemId" => $waitKey,
            "itemDescription" => "Login WordPress via IDKollen",
            "pNo" => $socialSecurityNumber,
            "ipAddress" => $_SERVER['REMOTE_ADDR'],
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
