<?php

namespace ElseifAB\IDKollen\Auth;

class Item
{
    public static function boot(\WP_REST_Request $request)
    {
        return new \WP_REST_Response(get_option($request->get_param('item')));
    }
}
