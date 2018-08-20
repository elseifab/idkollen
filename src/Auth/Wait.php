<?php

namespace ElseifAB\IDKollen\Auth;

use ElseifAB\IDKollen\Settings\Timeout;

class Wait
{

    public static function loop($param)
    {
        $timeout = Timeout::get();

        $break = false;

        $result = false;

        update_option($param, 'loop');

        while (!$break && $timeout) {
            $timeout--;
            sleep(1);

            $value = get_option($param);

            if ($value != 'loop') {
                $break = true;
                $result = $value;
            }
        }

        delete_option($param);

        return $result;
    }

}
