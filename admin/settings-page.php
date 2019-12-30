<?php

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
