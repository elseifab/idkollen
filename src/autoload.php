<?php
/**
 * Legacy Autoloader
 * Simple autoloader, so we don't need Composer just for this.
 */

spl_autoload_register(function ($class) {

    if (0 !== strpos($class, 'ElseifAB\\IDKollen\\', 0)) {
        return false;
    }

    static $loaded = array();

    if (isset($loaded[$class])) {
        return $loaded[$class];
    }

    $path = __DIR__;
    $extension = '.php';

    $_class = str_replace('ElseifAB\\IDKollen', '', $class);
    $_class = str_replace('_', '-', $_class);
    $_class = str_replace('\\', DIRECTORY_SEPARATOR, $_class);

    if (!file_exists($path . $_class . $extension)) {
        return false;
    }

    return $loaded[$class] = (bool)require $path . $_class . $extension;
});
