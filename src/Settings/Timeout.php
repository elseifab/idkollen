<?php

namespace ElseifAB\IDKollen\Settings;

/**
 * Class TokenManager
 * @package ElseifAB\IDKollen\Token
 */
class Timeout
{
    const KEY_OPTION_KEY = 'idkollen-timeout';

    /**
     * @return string|null
     */
    public static function get()
    {
        $result = (int)get_option(self::KEY_OPTION_KEY, 30);
        if (!$result) {
            return 30;
        }
        return $result;
    }

    /**
     * @param $value
     */
    public static function set($value)
    {
        update_option(self::KEY_OPTION_KEY, $value);
    }
}
