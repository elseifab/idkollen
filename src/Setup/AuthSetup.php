<?php

namespace ElseifAB\IDKollen\Setup;

use ElseifAB\IDKollen\Auth\Routes;

/**
 * Class AuthSetup
 * @package ElseifAB\IDKollen\Setup
 */
class AuthSetup implements SetupInterface
{
    /**
     *
     */
    public static function register()
    {
        add_action('rest_api_init', function () {
            Routes::register();
        });
    }
}
