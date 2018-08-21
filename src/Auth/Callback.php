<?php

namespace ElseifAB\IDKollen\Auth;

class Callback
{
    public static function boot(\WP_REST_Request $request)
    {
        $result = $request->get_body_params();

        $itemId = isset($result['itemId']) ? $result['itemId'] : null;
        $token = isset($result['idkToken']) ? $result['idkToken'] : null;

        if ($itemId && $token) {
            update_option($itemId, $token);
            return new \WP_REST_Response([
                "result" => "success",
                'itemId' => $itemId,
                "token" => $token,
            ]);
        }

        // temporary
        update_option($itemId, $result);

        return new \WP_REST_Response(["itemId or idkToken missing"], 404);
    }
}
