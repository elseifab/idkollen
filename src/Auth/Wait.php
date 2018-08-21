<?php

namespace ElseifAB\IDKollen\Auth;

use ElseifAB\IDKollen\Settings\Timeout;

class Wait
{

    public static function loop($param)
    {
        $timeout = (int)Timeout::get();

        $break = false;

        $result = false;

        set_transient($param, 'loop');

        while (!$break) {
            $timeout--;
            sleep(1);

            $value = get_transient($param);

            if ($value != 'loop') {
                $break = true;
                $result = $value;
            }

            if ($timeout <= 0) {
                $break = true;
            }

        }

        //delete_option($param);

        return $result;
    }

}
