<?php

// Exit if file is called directly
if (!defined('ABSPATH')) {
  exit;
}

// Register plugin settings
function myplugin_register_settings()
{
  register_setting('myplugin_options', 'myplugin_options', 'myplugin_validate_option');

  // Add Settings section
  add_settings_section(
    'myplugin_section_login',
    esc_html__('Customize Login Page', 'myplugin'),
    'myplugin_section_login_callback',
    'myplugin'
  );

  add_settings_section(
    'myplugin_section_admin',
    esc_html__('Customize Admin Area', 'myplugin'),
    'myplugin_section_admin_callback',
    'myplugin'
  );

  // Add Settings field
  add_settings_field(
    'custom_url',
    esc_html__('Custom URL', 'myplugin'),
    'myplugin_callback_field_text',
    'myplugin',
    'myplugin_section_login',
    ['id' => 'custom_url', 'label' => esc_html__('Custom URL for the login logo link', 'myplugin')]
  );

  add_settings_field(
    'custom_title',
    esc_html__('Custom Title', 'myplugin'),
    'myplugin_callback_field_text',
    'myplugin',
    'myplugin_section_login',
    ['id' => 'custom_title', 'label' => esc_html__('Custom title attribute for the logo link', 'myplugin')]
  );

  add_settings_field(
    'custom_style',
    esc_html__('Custom Style', 'myplugin'),
    'myplugin_callback_field_radio',
    'myplugin',
    'myplugin_section_login',
    ['id' => 'custom_style', 'label' => esc_html__('Custom CSS for the Login screen', 'myplugin')]
  );

  add_settings_field(
    'custom_message',
    esc_html__('Custom Message', 'myplugin'),
    'myplugin_callback_field_textarea',
    'myplugin',
    'myplugin_section_login',
    ['id' => 'custom_message', 'label' => esc_html__('Custom text and/or markup', 'myplugin')]
  );

  add_settings_field(
    'custom_footer',
    esc_html__('Custom Footer', 'myplugin'),
    'myplugin_callback_field_text',
    'myplugin',
    'myplugin_section_admin',
    ['id' => 'custom_footer', 'label' => esc_html__('Custom footer text', 'myplugin')]
  );

  add_settings_field(
    'custom_toolbar',
    esc_html__('Custom Toolbar', 'myplugin'),
    'myplugin_callback_field_checkbox',
    'myplugin',
    'myplugin_section_admin',
    ['id' => 'custom_toolbar', 'label' => esc_html__('Remove new post and comment links from the Toolbar', 'myplugin')]
  );

  add_settings_field(
    'custom_scheme',
    esc_html__('Custom Scheme', 'myplugin'),
    'myplugin_callback_field_select',
    'myplugin',
    'myplugin_section_admin',
    ['id' => 'custom_scheme', 'label' => esc_html__('Default color scheme for new users', 'myplugin')]
  );
}

add_action('admin_init', 'myplugin_register_settings');
