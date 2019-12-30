<?php

if (!defined('ABSPATH')) {
  exit;
}

function myplugin_add_toplevel_menu()
{
  /*
     add_menu_page(
       string $page_title,
       string $menu_title,
       string $capability,
       string $menu_slug,
       callable $function = '',
       string $icon_url = '',
       int $position = null
     )
     */

  add_submenu_page('options-general.php', 'MyPlugin Settings', 'MyPlugin', 'manage_options', 'myplugin', 'myplugin_display_settings_page');
}

add_action('admin_menu', 'myplugin_add_toplevel_menu');
