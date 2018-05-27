<?php

namespace ElseifAB\IDKollen\API;

/**
 * Class TokenManager
 * @package ElseifAB\IDKollen\Token
 */
class ApiKeyManager
{
    const KEY_OPTION_KEY = 'id-kollen-key';

    /**
     * @return string|null
     */
    public static function get()
    {
        $result = get_option(self::KEY_OPTION_KEY, null);
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
