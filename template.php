<?php
/**
 * @file
 * Preprocess, theme, and alter hooks.
 */

/*******************************************************************************
 * Preprocess functions here prepare variables for existing templates.
*******************************************************************************/

/**
 * Prepares variables for node templates.
 *
 * @see node.tpl.php
 */
function template_preprocess_node(&$variables) {
  $variables['classes'][] = 'content';
}

/*******************************************************************************
 * Theme functions here override existing theme functions.
*******************************************************************************/

/**
 * Overrides theme_breadcrumb().
 */
function foo_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  $output = '';
  if (!empty($breadcrumb)) {
    // Add useful aria-label for screen-readers.
    $output .= '<nav role="navigation" class="breadcrumb" aria-label="Website Orientation">';
    // Remove confusing you-are-here heading for screen-readers.
    $output .= '<ol><li>' . implode(' » </li><li>', $breadcrumb) . '</li></ol>';
    $output .= '</nav>';
  }
  return $output;
}

/*******************************************************************************
 * Alter functions here will alter existing data structures.
*******************************************************************************/

/* Note: using alter functions in a theme is not a best practice. It is safer
   to alter data structires from a module whenever possible. */
