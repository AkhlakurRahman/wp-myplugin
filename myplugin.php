<?php
/*
Plugin Name: My Plugin
Plugin URI: https://akrahman.me
Description: Trying different things and practicing to build a plugin
Version: 1.0.0
Author: Akhlakur Rahman
Author URI: https://akrahman.me
Text Domain: myplugin
Domain Path: /languages
*/

// Exit if file is called directly
if (!defined('ABSPATH')) {
  exit;
}

// Load text domain
function myplugin_load_textdomain()
{
  load_plugin_textdomain('myplugin', false, plugin_dir_path(__FILE__) . 'languages/');
}

add_action('plugin_loaded', 'myplugin_load_textdomain');

// if user is admin
if (is_admin()) {
  require_once(plugin_dir_path(__FILE__) . '/admin/admin-menu.php');
  require_once(plugin_dir_path(__FILE__) . '/admin/settings-page.php');
  require_once(plugin_dir_path(__FILE__) . '/admin/settings-register.php');
  require_once(plugin_dir_path(__FILE__) . '/admin/settings-callback.php');
  require_once(plugin_dir_path(__FILE__) . '/admin/settings-validate.php');
}

// accessible from both admin and public
require_once(plugin_dir_path(__FILE__) . '/includes/core-functions.php');

// default plugin options
function myplugin_options_default()
{
  return array(
    'custom_url'     => 'https://wordpress.org/',
    'custom_title'   => esc_html__('Powered by WordPress', 'myplugin'),
    'custom_style'   => 'disable',
    'custom_message' => '<p class="custom-message">' . esc_html__('My custom message', 'myplugin') . '</p>',
    'custom_footer'  => esc_html__('Special message for users', 'myplugin'),
    'custom_toolbar' => false,
    'custom_scheme'  => 'default',
  );
}
