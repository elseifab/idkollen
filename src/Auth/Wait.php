<?php

namespace ElseifAB\IDKollen\Auth;

class Wait
{

    public static function loop(\WP_REST_Request $request)
    {
        $item = $request->get_param('item');

        $result = false;

        $timeout = 5;

        while (true) {
            $timeout--;

            sleep(1);

            $url = rest_url(Paths::MAIN_URL . '/item/' . $item);
            $response = wp_remote_get($url);

            $value = $response['body'];

            if ($value != 'false') {
                return $value;
            }

            if ($timeout <= 0) {
                wp_redirect(rest_url(Paths::MAIN_URL.'/loop/'.$item));
            }

        }

        return $result;
    }

}
