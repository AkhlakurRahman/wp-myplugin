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

// Display the plugin setting page
function myplugin_display_settings_page()
{

  // Check if user is allowed to access
  if (!current_user_can('manage_options')) return;

?>

  <div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

    <form action="options.php" method="post">

      <?php
      // Output security fields
      settings_fields('myplugin_options');

      // Output setting sections
      do_settings_sections('myplugin');

      submit_button();
      ?>
    </form>
  </div>

<?php
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

  add_menu_page('My Plugin Settings', 'MyPlugin', 'manage_options', 'myplugin', 'myplugin_display_settings_page', 'dashicons-admin-generic', null);
}

add_action('admin_menu', 'myplugin_add_toplevel_menu');
