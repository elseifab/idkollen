<?php

namespace ElseifAB\IDKollen\Settings;

/**
 * Class TokenManager
 * @package ElseifAB\IDKollen\Token
 */
class Timeout
{
    const KEY_OPTION_KEY = 'id-kollen-timeout';

    /**
     * @return string|null
     */
    public static function get()
    {
        $result = (int)get_option(self::KEY_OPTION_KEY, null);
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
