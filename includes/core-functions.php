<?php

// Exit if file is called directly
if (!defined('ABSPATH')) {
  exit;
}

// Custom login logo url
function myplugin_custom_login_url($url)
{
  $options = get_option('myplugin_options', myplugin_options_default());

  if (isset($options['custom_url']) && !empty($options['custom_url'])) {
    $url = esc_url($options['custom_url']);
  }

  return $url;
}

add_filter('login_headerurl', 'myplugin_custom_login_url');

// Custom login logo title
function mypluing_custom_login_title($title)
{
  $options = get_option('myplugin_options', myplugin_options_default());

  if (isset($options['custom_title']) && !empty($options['custom_title'])) {
    $title = esc_attr($options['custom_title']);
  }

  return $title;
}

add_filter('login_headertext', 'mypluing_custom_login_title');

// Custom login styles
function myplugin_custom_login_styles()
{
  $styles = false;

  $options = get_option('myplugin_options', myplugin_options_default());

  if (isset($options['custom_style']) && !empty($options['custom_style'])) {
    $styles = sanitize_text_field($options['custom_style']);
  }

  if ('enable' === $styles) {
    wp_enqueue_style('myplugin', plugin_dir_url(dirname(__FILE__)) . 'public/css/myplugin-login.css', array(), null, 'screen');

    wp_enqueue_script('myplugin', plugin_dir_url(dirname(__FILE__)) . 'public/js/myplugin-login.js', array(), null, true);
  }
}

add_action('login_enqueue_scripts', 'myplugin_custom_login_styles');

// Custom login message
function myplugin_custom_login_message($message)
{
  $options = get_option('myplugin_options', myplugin_options_default());

  if (isset($options['custom_message']) && !empty($options['custom_message'])) {
    $message = wp_kses_post($options['custom_message']) . $message;
  }

  return $message;
}

add_action('login_message', 'myplugin_custom_login_message');

// Custom admin footer
function myplugin_custom_admin_footer($message)
{
  $options = get_option('myplugin_options', myplugin_options_default());

  if (isset($options['custom_footer']) && !empty($options['custom_footer'])) {
    $message = sanitize_text_field($options['custom_footer']);
  }

  return $message;
}

add_action('admin_footer_text', 'myplugin_custom_admin_footer');

// Custom admin toolbar
function myplugin_custom_admin_toolbar()
{
  $toolbar = false;

  $options = get_option('myplugin_options', myplugin_options_default());

  if (isset($options['custom_toolbar']) && !empty($options['custom_toolbar'])) {
    $toolbar = (bool) $options['custom_toolbar'];
  }

  if ($toolbar) {
    global $wp_admin_bar;

    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('new-content');
  }
}

add_action('wp_before_admin_bar_render', 'myplugin_custom_admin_toolbar');

// Custom admin scheme
function myplugin_custom_admin_scheme($user_id)
{
  $scheme = 'default';

  $options = get_option('myplugin_options', myplugin_options_default());

  if (isset($options['custom_scheme']) && !empty($options['custom_scheme'])) {
    $scheme = sanitize_text_field($options['custom_scheme']);
  }

  $args = ['ID' => $user_id, 'admin_color' => $scheme];

  wp_update_user($args);
}

add_action('user_register', 'myplugin_custom_admin_scheme');
