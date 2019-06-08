<?php
/*
 * Plugin Name: IDkollen
 * Description: Plugin för koppling mellan WP-konton och kontroll BankID via IDkollen
 * Version: 0.4.4
 * Author: Andreas Ek, Elseif
 * GitHub Plugin URI: elseifab/idkollen
 */

defined('ABSPATH') or die('No script kiddies please!');

require_once __DIR__ . '/src/autoload.php';

ElseifAB\IDKollen\Setup\Setup::register();
