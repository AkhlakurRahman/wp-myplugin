<?php

// Exit if uninstall constant is not defined
if (!defined('WP_UNINSTALL_PLUGIN')) {
  exit;
}

// Delete MyPlugin options
delete_option('myplugin_options');
