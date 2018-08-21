<?php

namespace ElseifAB\IDKollen\Auth;

/**
 * Undocumented class
 */
class Routes
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public static function register()
    {
        register_rest_route(Paths::MAIN_URL, '/auth', [
            'methods' => 'POST',
            'callback' => __NAMESPACE__ . '\Init::boot',
            'permission_callback' => function () {
                return true;
            },
        ]);

        register_rest_route(Paths::MAIN_URL, '/callback', [
            'methods' => 'POST',
            'callback' => __NAMESPACE__ . '\Callback::boot',
            'permission_callback' => function () {
                return true;
            },
        ]);
    }
}
