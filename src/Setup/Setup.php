<?php

namespace ElseifAB\IDKollen\Setup;

class Setup
{
    public static function register()
    {
        foreach (glob(__DIR__ . "/*.php") as $filename) {
            $base = __NAMESPACE__.'\\';
            $filename = pathinfo($filename)['filename'];
            if (in_array("{$base}SetupInterface", class_implements("{$base}{$filename}"))) {
                $callable = "{$base}{$filename}::register";
                call_user_func($callable);
            }
        }
    }
}
