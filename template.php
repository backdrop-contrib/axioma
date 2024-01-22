<?php
/**
 * @file
 * Axioma preprocess functions and theme function overrides.
 */

require_once('theme-settings.inc');
module_load_include('inc', 'system', 'system.menu');

/**
 * Implements hook_preprocess_header().
 * Builds and renders menu for the header blcok.
 */
function axioma_preprocess_header(&$variables) {
  // Get blocks used in current layout.
  module_load_include('inc', 'layout', 'layout.admin');
  $blocks = layout_get_layout_by_path()->content;
  // Find header block.
  foreach ($blocks as $block) {
    if ($block->plugin == 'system:header') {
      // If theme logo is set, then load logo svg data from file.
      $header_has_logo = $block->settings['block_settings']['logo'];
      $is_theme_logo = config_get('system.core', 'site_logo_theme');
      $theme_path = backdrop_get_path('theme', 'axioma');
      if ($header_has_logo && $is_theme_logo) {
        $variables['ax_logo'] = file_get_contents($theme_path . '/img/ax_logo.svg');
      }
      else {
        $variables['ax_logo'] = FALSE;
      }
      // Get name of the menu being used in the header block.
      $menu_name = $block->settings['block_settings']['menu'];
      if (empty($menu_name)) {
        $variables['menu'] = FALSE;
      }
      else {
        // Build menu render array.
        $config = get_header_menu_config($menu_name);
        $data = system_menu_block_build($config);
        // Render HTML for the menu.
        $variables['menu'] = backdrop_render($data['content']);
        // If sticky option is on then add the sticky script.
        $sticky_option = theme_get_setting('header_menu_sticky', 'axioma');
        if (!empty($sticky_option)) {
          backdrop_add_js($theme_path . '/js/sticky.js');
        }
      }
      break;
    }
  }
}

/**
 * Implements hook_preprocess_block().
 * Sets alignment for system provided menu blocks.
 */
function axioma_preprocess_block(&$variables) {
  if (isset($variables['block'])) {
    switch ($variables['block']->plugin) {
      case 'system:main-menu':
        $variables['ax_align'] = 'ax-align-' . get_alighnment_setting('align_main_menu');
      break;
      case 'system:management':
        $variables['ax_align'] = 'ax-align-' . get_alighnment_setting('align_management');
      break;
      case 'system:user-menu':
        $variables['ax_align'] = 'ax-align-' . get_alighnment_setting('align_user_menu');
      break;
    }
  }
}

/**
 * Implements hook_preprocess_page().
 * Loads stylesheet with font setings based on theme options.
 */
function axioma_preprocess_page(&$variables) {
  $path_module = backdrop_get_path('theme', 'axioma');
  $options = array(
    'group' => 'CSS_THEME',
    'every_page' => TRUE,
  );
  if (!empty(theme_get_setting('font_thin', 'axioma'))) {
    $path = $path_module . '/css/font_thin.css';
  }
  else {
    $path = $path_module . '/css/font.css';
  }
  backdrop_add_css($path, $options);

  if (empty(theme_get_setting('hero_art', 'axioma'))) {
    backdrop_add_css($path_module . '/css/components/hero_art.css', $options);
  }
}

/**
 * Implements hook_html_head_alter().
 * Adds links for google fonts loading.
 */
function axioma_html_head_alter(&$head_elements) {
  // Prepare api preconnect link for google fonts.
  $fonts_apis_preconnect = array(
    '#tag' => 'link',
    '#attributes' => array(
      'rel' => 'preconnect',
      'href' => 'https://fonts.googleapis.com',
    ),
    '#type' => 'head_tag',
  );
  // Prepare static preconnect link for google fonts.
  $fonts_static_preconnect = array(
    '#tag' => 'link',
    '#attributes' => array(
      'rel' => 'preconnect',
      'href' => 'https://fonts.gstatic.com',
      'crossorigin' => NULL,
    ),
    '#type' => 'head_tag',
  );
  // Select google font set link depending on the theme option.
  if (theme_get_setting('font_thin', 'axioma')) {
    $font_set = 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;1,300;1,400&display=swap';
  }
  else {
    $font_set = 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;1,400;1,500&display=swap';
  }
  // Prepare link for google font set.
  $google_fonts = array(
    '#tag' => 'link',
    '#attributes' => array(
      'href' => $font_set,
      'rel' => 'stylesheet',
    ),
    '#type' => 'head_tag',
  );
  // Add all links to header render array.
  $head_elements += array(
    'fonts_api_preconnect' => $fonts_apis_preconnect,
    'fonts_static_preconnect' => $fonts_static_preconnect,
    'google_fonts' => $google_fonts,
  );
}
