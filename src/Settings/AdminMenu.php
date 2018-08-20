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

        if (isset($_REQUEST['timeout'])) {
            Timeout::set((int)esc_attr($_REQUEST['timeout']));
        }

        if (isset($_REQUEST['debug'])) {
            Debug::current()->enable();
        } elseif (isset($_POST['save'])) {
            Debug::current()->disable();
        }

        $apiKey = ApiKeyManager::get();

        echo Template::render('admin/settings', [
            'headline' => __('Inställningar för IDkollen', 'id-kollen'),
            'body' => __('Specifika inställningar för plugin IDkollen', 'IDkollen'),
            'apiUrl' => rest_url(Paths::MAIN_URL . '/auth'),
            'apiKey' => $apiKey,
            'timeout' => Timeout::get(),
            'debug' => Debug::current()->enabled(),
        ]);
    }

}
