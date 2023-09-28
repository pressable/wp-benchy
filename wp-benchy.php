<?php
/**
 * WP Benchy
 * 
 * @package Pressable\WP_Benchy
 * @author Pressable
 * @license GPL-3.0
 * @copyright 2023 Pressable
 * 
 * @wordpress-plugin
 * Plugin Name: WP Benchy
 * Plugin URI: https://github.com/pressable/wp-benchy
 * Description: An easy to extend, easy to use benchmarking plugin for WordPress.
 * Version: 0.1.0
 * Author: Pressable, JeffMatson
 * Author URI: https://pressable.com
 * License: GPL3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: wp-benchy
 * Domain Path: /languages
 * Requires at least: 5.2
 * Requires PHP: 7.4
 */

require __DIR__ . '/vendor/autoload.php';

define('WP_BENCHY_DIR_URL', plugin_dir_url( __FILE__ ) );
define('WP_BENCHY_DIR_PATH', plugin_dir_path( __FILE__ ) );

$main = new \Pressable\WP_Benchy\Main();
$main->init();