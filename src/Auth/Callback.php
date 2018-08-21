<?php

namespace ElseifAB\IDKollen\Auth;

class Callback
{
    public static function boot(\WP_REST_Request $request)
    {
        $result = $request->get_json_params();

        $itemId = isset($result['itemId']) ? $result['itemId'] : null;
        $token = isset($result['idkToken']) ? $result['idkToken'] : null;

        if ($itemId && $token) {
            set_transient($itemId, $token);
            return new \WP_REST_Response([
                "result" => "success",
                'itemId' => $itemId,
                "token" => $token,
            ]);
        }

        set_transient('idkollen_latest', $result);
        return new \WP_REST_Response(["itemId or idkToken missing"], 400);
    }
}
