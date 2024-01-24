<?php
/**
 * @file
 * Functions used in theme settings.php and template.php for Axioma theme.
 */

/**
 * Returns menu config that is either loaded from theme config or filled with default values.
 *
 * @param $menu_name
 *   This menu name will be put into config.
 *   By default 'main-menu' is used.
 * @return
 *   Array of menu settings. This array can be used for system menu generation.
 */
function get_header_menu_config($menu_name = 'main-menu') {
  // Populate menu config array with default values.
  $config = array(
    'level' => 1,
    'menu_name' => $menu_name,
    'style' => 'top-only',
    'expand_all' => FALSE,
    'clickdown' => 0,
    'toggle_text' => 'Menu',
    'depth' => 0,
    'toggle' => 1,
  );
  // Replace default values with those that are saved in theme settings.
  foreach ($config as $name => $value) {
    $setting = theme_get_setting($name, 'axioma');
    if (isset($setting)) {
      $config[$name] = $setting;
    }
  }
  // Ensure that 'expand all' is not set for the 'top-only' menu style.
  $config['expand_all'] = ($config['style'] == 'top-only') ? FALSE : TRUE;
  return $config;
}

/**
 * Returns alignment setting, either defaut or from the theme config.
 */
function get_alighnment_setting($option) {
  $saved_setting = theme_get_setting($option, 'axioma');
  return isset($saved_setting) ? $saved_setting : 'center';
}
