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

            $value = apply_filters($param, false);

            if ($value) {
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
