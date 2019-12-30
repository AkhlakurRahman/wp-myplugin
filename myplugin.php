<?php
/*
Plugin Name: My Plugin
Plugin URI: https://akrahman.me
Description: Trying different things and practicing to build a plugin
Version: 1.0.0
Author: Akhlakur Rahman
Author URI: https://akrahman.me
*/

// Exit if file is called directly
if (!defined('ABSPATH')) {
  exit;
}

// if user is admin
if (is_admin()) {
  require_once(plugin_dir_path(__FILE__) . '/admin/admin-menu.php');
  require_once(plugin_dir_path(__FILE__) . '/admin/settings-page.php');
}
