<?php

// Exit if file is called directly
if (!defined('ABSPATH')) {
  exit;
}

// Validate plugin settings
function myplugin_validate_options($input)
{
  // Custom Url
  if (isset($input['custom_url'])) {
    $input['custom_url'] = esc_url($input['custom_url']);
  }

  // Custom title
  if (isset($input['custom_title'])) {
    $input['custom_title'] = sanitize_text_field($input['custom_title']);
  }

  // Custom Style
  $radio_options = [
    'enable' => 'Enable custom styles',
    'disable' => 'Disable custom styles'
  ];

  if (!isset($input['custom_style'])) {
    $input['custom_style'] = null;
  }

  if (!array_key_exists($input['custom_style'], $radio_options)) {
    $input['custom_style'] = null;
  }

  // Custom Message
  if (isset($input['custom_message'])) {
    $input['custom_message'] = wp_kses_post($input['custom_message']);
  }

  // Custom Footer
  if (isset($input['custom_footer'])) {
    $input['custom_footer'] = sanitize_text_field($input['custom_footer']);
  }

  // Custom Toolbar
  if (!isset($input['custom_toolbar'])) {
    $input['custom_toolbar'] = null;
  }

  $input['custom_toolbar'] = ($input['custom_toolbar'] == 1 ? 1 : 0);

  // Custom Scheme
  $select_options = [
    'default'   => 'Default',
    'light'     => 'Light',
    'blue'      => 'Blue',
    'coffee'    => 'Coffee',
    'ectoplasm' => 'Ectoplasm',
    'midnight'  => 'Midnight',
    'ocean'     => 'Ocean',
    'sunrise'   => 'Sunrise',
  ];

  if (!isset($input['custom_scheme'])) {
    $input['custom_scheme'] = null;
  }

  if (!array_key_exists($input['custom_scheme'], $select_options)) {
    $input['custom_scheme'] = null;
  }

  return $input;
}
