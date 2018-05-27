<?php
/*
 * Plugin Name: ID-Kollen
 * Description: Plugin för att underlätta koppling ID-Kollen och WP-konton
 * Version: 0.1
 * Author: Andreas Ek, Elseif
 */

defined('ABSPATH') or die('No script kiddies please!');

require_once __DIR__ . '/src/autoload.php';

ElseifAB\IDKollen\Setup\Setup::register();