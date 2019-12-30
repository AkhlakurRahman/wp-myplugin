<?php

// Exit if file is called directly
if (!defined('ABSPATH')) {
  exit;
}

// Validate plugin settings
function myplugin_validate_options($input)
{
  return $input;
}

function myplugin_section_login_callback()
{
  echo '<p>These settings enable you to customize the WP Login section.</p>';
}

function myplugin_section_admin_callback()
{
  echo '<p>These settings enable you to customize the WP Admin area.</p>';
}

function myplugin_callback_field_text($args)
{
  $options = get_option('myplugin_options', myplugin_options_default());

  $id = isset($args['id']) ? $args['id'] : '';
  $label = isset($args['label']) ? $args['label'] : '';

  $value = isset($options[$id]) ? sanitize_text_field($options[$id]) : '';

  echo '<input id="myplugin_options_' . $id . '" name="myplugin_options[' . $id . ']" type="text" size="40" value="' . $value . '" /><br/>';

  echo '<label for="myplugin_options_' . $id . '">' . $label . '</label><br/>';
}

function myplugin_callback_field_radio($args)
{
  $options = get_option('myplugin_options', myplugin_options_default());

  $id = isset($args['id']) ? $args['id'] : '';

  $selected_option = isset($options[$id]) ? sanitize_text_field($options[$id]) : '';

  $radio_options = [
    'enable' => 'Enable custom styles',
    'disable' => 'Disable custom styles'
  ];

  foreach ($radio_options as $key => $value) {
    $checked = checked($selected_option === $key, true, false);

    echo '<label><input type="radio" name="myplugin_options[' . $id . ']" value="' . $key . '"' . $checked . ' />';
    echo '<span>' . $value . '</span></label><br/>';
  }
}

// callback: textarea field
function myplugin_callback_field_textarea($args)
{

  $options = get_option('myplugin_options', myplugin_options_default());

  $id    = isset($args['id'])    ? $args['id']    : '';
  $label = isset($args['label']) ? $args['label'] : '';

  $allowed_tags = wp_kses_allowed_html('post');

  $value = isset($options[$id]) ? wp_kses(stripslashes_deep($options[$id]), $allowed_tags) : '';

  echo '<textarea id="myplugin_options_' . $id . '" name="myplugin_options[' . $id . ']" rows="5" cols="50">' . $value . '</textarea><br />';
  echo '<label for="myplugin_options_' . $id . '">' . $label . '</label>';
}

// callback: checkbox field
function myplugin_callback_field_checkbox($args)
{

  $options = get_option('myplugin_options', myplugin_options_default());

  $id    = isset($args['id'])    ? $args['id']    : '';
  $label = isset($args['label']) ? $args['label'] : '';

  $checked = isset($options[$id]) ? checked($options[$id], 1, false) : '';

  echo '<input id="myplugin_options_' . $id . '" name="myplugin_options[' . $id . ']" type="checkbox" value="1"' . $checked . '> ';
  echo '<label for="myplugin_options_' . $id . '">' . $label . '</label>';
}

// callback: select field
function myplugin_callback_field_select($args)
{

  $options = get_option('myplugin_options', myplugin_options_default());

  $id    = isset($args['id'])    ? $args['id']    : '';
  $label = isset($args['label']) ? $args['label'] : '';

  $selected_option = isset($options[$id]) ? sanitize_text_field($options[$id]) : '';

  $select_options = array(

    'default'   => 'Default',
    'light'     => 'Light',
    'blue'      => 'Blue',
    'coffee'    => 'Coffee',
    'ectoplasm' => 'Ectoplasm',
    'midnight'  => 'Midnight',
    'ocean'     => 'Ocean',
    'sunrise'   => 'Sunrise',

  );

  echo '<select id="myplugin_options_' . $id . '" name="myplugin_options[' . $id . ']">';

  foreach ($select_options as $value => $option) {

    $selected = selected($selected_option === $value, true, false);

    echo '<option value="' . $value . '"' . $selected . '>' . $option . '</option>';
  }

  echo '</select> <label for="myplugin_options_' . $id . '">' . $label . '</label>';
}
