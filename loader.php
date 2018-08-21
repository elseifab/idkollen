<?php
/*
 * Plugin Name: ID-Kollen
 * Description: Plugin för koppling mellan WP-konton och kontroll BankID via Idkollen
 * Version: 0.2.6
 * Author: Andreas Ek, Elseif
 * GitHub Plugin URI: elseifab/id-kollen
 */

defined('ABSPATH') or die('No script kiddies please!');

require_once __DIR__ . '/src/autoload.php';

ElseifAB\IDKollen\Setup\Setup::register();
