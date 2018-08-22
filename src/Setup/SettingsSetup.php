<?php

namespace ElseifAB\IDKollen\Setup;

class SettingsSetup implements SetupInterface
{

    public static function register()
    {

        add_action('admin_menu', function () {
            \add_submenu_page(
                'options-general.php',
                __('IDkollen', 'IDkollen'),
                __('IDkollen', 'IDkollen'),
                'manage_options',
                'idkollen-settings',
                'ElseifAB\IDKollen\Settings\AdminMenu::render'
            );
        });

    }

}
