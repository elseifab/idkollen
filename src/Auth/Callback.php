<?php

namespace ElseifAB\IDKollen\Auth;

class Callback
{
    public static function boot(\WP_REST_Request $request)
    {
        $result = $request->get_params();
        $optionParam = $request->get_param('itemId');
        if ($optionParam) {
            update_option($optionParam, $result);
            return new \WP_REST_Response(["result" => '"success"']);
        }

        return new \WP_REST_Response(["itemId missing"], 404);
    }
}
