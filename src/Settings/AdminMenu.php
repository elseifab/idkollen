<?php

namespace ElseifAB\IDKollen\Settings;

use ElseifAB\IDKollen\API\ApiKeyManager;
use ElseifAB\IDKollen\Auth\Paths;
use ElseifAB\IDKollen\Helper\Debug;
use ElseifAB\IDKollen\Helper\Template;

class AdminMenu
{

    public static function render()
    {
        if (isset($_REQUEST['apiKey'])) {
            ApiKeyManager::set(esc_attr($_REQUEST['apiKey']));
        }

        if (isset($_REQUEST['debug'])) {
            Debug::current()->enable();
        } elseif (isset($_POST['save'])) {
            Debug::current()->disable();
        }

        $apiKey = ApiKeyManager::get();

        echo Template::render('admin/settings', [
            'headline' => __('Inställningar för id-kollen', 'id-kollen'),
            'body' => __('Specifika inställningar för plugin id-kollen', 'id-kollen'),
            'apiUrl' => rest_url(Paths::MAIN_URL . '/auth'),
            'apiKey' => $apiKey,
            'debug' => Debug::current()->enabled(),
        ]);
    }

}
