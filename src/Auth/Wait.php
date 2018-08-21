<?php

namespace ElseifAB\IDKollen\Auth;

use ElseifAB\IDKollen\Settings\Timeout;

class Wait
{

    public static function loop($param)
    {
        global ${$param};

        $timeout = (int)Timeout::get();

        $break = false;

        $result = false;

        while (!$break) {
            $timeout--;

            sleep(1);

            $url = rest_url(Paths::MAIN_URL . '/item/' . $param);
            $response = wp_remote_get($url);

            $value = $response['body'];

            if ($value != 'false') {
                $break = true;
                $result = $value;
            }

            if ($timeout <= 0) {
                $break = true;
            }

        }

        return $result;
    }

}
