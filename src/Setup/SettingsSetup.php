<?php

namespace ElseifAB\IDKollen\Setup;

class SettingsSetup implements SetupInterface
{

    public static function register()
    {

        add_action('admin_menu', function () {
            \add_submenu_page(
                'options-general.php',
                __('id-kollen', 'id-kollen'),
                __('id-kollen', 'id-kollen'),
                'manage_options',
                'id-kollen-settings',
                'ElseifAB\IDKollen\Settings\AdminMenu::render'
            );
        });

    }

}
