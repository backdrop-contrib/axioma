<?php
/**
 * @file
 * Axioma color module setup.
 */
$info = array(
  // Available colors and color labels used in theme.
  'fields' => array(
    'background' => t('Background'),
    'base'       => t('Main color'),
    'accent'     => t('Accent color'),
    'menu_bg'    => t('Dropdown menu'),
    'hero_font'  => t('Hero block font color'),
    'alert'      => t('Alert color'),
  ),

  // Pre-defined color schemes.
  'schemes' => array(
    'default' => array(
      'title' => t('Paper (default)'),
      'colors' => array(
        'background' => '#ffffff',
        'base'       => '#797979',
        'accent'     => '#262626',
        'menu_bg'    => '#faf8f8',
        'hero_font'  => '#fff5e5',
        'alert'      => '#ffab00',
      ),
    ),
    'milk' => array(
      'title' => t('Milk'),
      'colors' => array(
        'background' => '#fefdfb', //#f7f5f2
        'base'       => '#666363',
        'accent'     => '#1f1e1e',
        'menu_bg'    => '#edebe8',
        'hero_font'  => '#fff5e5',
        'alert'      => '#ffab00',
      ),
    ),
    'lime' => array(
      'title' => t('Lime'),
      'colors' => array(
        'background' => '#fffdf5',
        'base'       => '#6c6565',
        'accent'     => '#6da702',
        'menu_bg'    => '#faf7eb',
        'hero_font'  => '#fff5e5',
        'alert'      => '#ffab00',
      ),
    ),
    'velvet' => array(
      'title' => t('Velvet'),
      'colors' => array(
        'background' => '#633645',
        'base'       => '#b7b6a9',
        'accent'     => '#dea75e',
        'menu_bg'    => '#5e2d35',
        'hero_font'  => '#fff5e5',
        'alert'      => '#ffab00',
      ),
    ),
    'twilight' => array(
      'title' => t('Twilight'),
      'colors' => array(
        'background' => '#393939',
        'base'       => '#cfcfcf',
        'accent'     => '#c8b9a2',
        'menu_bg'    => '#424242',
        'hero_font'  => '#fff5e5',
        'alert'      => '#ffab00',
      ),
    ),
    'night' => array(
      'title' => t('Night'),
      'colors' => array(
        'background' => '#171717',
        'base'       => '#888481',
        'accent'     => '#dddbd5',
        'menu_bg'    => '#2e2e2e',
        'hero_font'  => '#fff5e5',
        'alert'      => '#ffab00',
      ),
    ),
  ),

  'blend_target' => '#ffffff',

  // CSS files (excluding @import) to rewrite with new color scheme.
  'css' => array(
    'css/color.css',
  ),
);