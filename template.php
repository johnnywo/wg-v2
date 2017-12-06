<?php

/*
 * Here we override the default HTML output of drupal.
 * refer to http://drupal.org/node/550722
 */

// Auto-rebuild the theme registry during theme development.
if (theme_get_setting('clear_registry')) {
  // Rebuild .info data.
  system_rebuild_theme_data();
  // Rebuild theme registry.
  drupal_theme_rebuild();
}
// Add Zen Tabs styles
if (theme_get_setting('boilerplate_tabs')) {
  drupal_add_css( drupal_get_path('theme', 'boilerplate') . '/css/tabs.css');
}

/**
 * Preprocesses the wrapping HTML.
 *
 * @param array &$variables
 *   Template variables.
 */
function boilerplate_preprocess_html(&$vars) {
  if (!module_exists('conditional_styles')) {
    boilerplate_add_conditional_styles();
  }
  // Setup IE meta tag to force IE rendering mode
  $meta_ie_render_engine = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'content' =>  'IE=edge,chrome=1',
      'http-equiv' => 'X-UA-Compatible',
    )
  );
  //  Mobile viewport optimized: h5bp.com/viewport
  $meta_viewport = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'content' =>  'width=device-width, maximum-scale=1.0',
      'name' => 'viewport',
    )
  );

  // Add header meta tag for IE to head
  drupal_add_html_head($meta_ie_render_engine, 'meta_ie_render_engine');
  drupal_add_html_head($meta_viewport, 'meta_viewport');
  
  // Add Font Awesome Stylesheet
  drupal_add_css(path_to_theme() . '/css/font-awesome/css/font-awesome.min.css', array('weight' => CSS_THEME));
}

function boilerplate_preprocess_page(&$vars, $hook) {
  if (isset($vars['node_title'])) {
    $vars['title'] = $vars['node_title'];
  }
  // Adding a class to #page in wireframe mode
  if (theme_get_setting('wireframe_mode')) {
    $vars['classes_array'][] = 'wireframe-mode';
  }
  // Adding classes wether #navigation is here or not
  if (!empty($vars['main_menu']) or !empty($vars['sub_menu'])) {
    $vars['classes_array'][] = 'with-navigation';
  }
  if (!empty($vars['secondary_menu'])) {
    $vars['classes_array'][] = 'with-subnav';
  }
  // node.tpl.php suggestion
  if (isset($variables['node']->type)) {
    $content_type = $variables['node']->type;
    $variables['theme_hook_suggestions'][] = 'page__' . $content_type;
  }
  // page.tpl.php suggestion 
  if (!empty($vars['node']) && !empty($vars['node']->type)) {
    $vars['theme_hook_suggestions'][] = 'page__node__' . $vars['node']->type;
  } 
  //kpr($vars);
}


function boilerplate_preprocess_node(&$vars) {
  // Add a striping class.
  $vars['classes_array'][] = 'node-' . $vars['zebra'];
  
  //kpr($vars);
}

function boilerplate_preprocess_block(&$vars, $hook) {
  // Add a striping class.
  $vars['classes_array'][] = 'block-' . $vars['zebra'];
  //kpr($vars);
}

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return
 *   A string containing the breadcrumb output.
 */
function boilerplate_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];  // Determine if we are to display the breadcrumb.
  $show_breadcrumb = theme_get_setting('boilerplate_breadcrumb');
  if ($show_breadcrumb == 'yes' || ($show_breadcrumb == 'admin' && arg(0) == 'admin')) {



    // Optionally get rid of the homepage link.
    $show_breadcrumb_home = theme_get_setting('boilerplate_breadcrumb_home');
    if (!$show_breadcrumb_home) {
      array_shift($breadcrumb);
    }
    // Return the breadcrumb with separators.
    if (!empty($breadcrumb)) {
      $breadcrumb_separator = theme_get_setting('boilerplate_breadcrumb_separator');
      $trailing_separator = $title = '';
      if (theme_get_setting('boilerplate_breadcrumb_title')) {
        $item = menu_get_item();
        if (!empty($item['tab_parent'])) {
          // If we are on a non-default tab, use the tab's title.
          $title = check_plain($item['title']);
        }
        else {
          $title = drupal_get_title();
        }
        if ($title) {
          $trailing_separator = $breadcrumb_separator;
        }
      }
      elseif (theme_get_setting('boilerplate_breadcrumb_trailing')) {
        $trailing_separator = $breadcrumb_separator;
      }
      // Provide a navigational heading to give context for breadcrumb links to
      // screen-reader users. Make the heading invisible with .element-invisible.
      $heading = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

      return $heading . '<div class="breadcrumb">' . implode($breadcrumb_separator, $breadcrumb) . $trailing_separator . $title . '</div>';
    }
  }
  // Otherwise, return an empty string.
  return '';
}

/**
 * Adds conditional CSS from the .info file.
 *
 * Copy of conditional_styles_preprocess_html().
 */
function boilerplate_add_conditional_styles() {
  // Make a list of base themes and the current theme.
  $themes = $GLOBALS['base_theme_info'];
  $themes[] = $GLOBALS['theme_info'];
  foreach (array_keys($themes) as $key) {
    $theme_path = dirname($themes[$key]->filename) . '/';
    if (isset($themes[$key]->info['stylesheets-conditional'])) {
      foreach (array_keys($themes[$key]->info['stylesheets-conditional']) as $condition) {
        foreach (array_keys($themes[$key]->info['stylesheets-conditional'][$condition]) as $media) {
          foreach ($themes[$key]->info['stylesheets-conditional'][$condition][$media] as $stylesheet) {
            // Add each conditional stylesheet.
            drupal_add_css(
              $theme_path . $stylesheet,
              array(
                'group' => CSS_THEME,
                'browsers' => array(
                  'IE' => $condition,
                  '!IE' => FALSE,
                ),
                'every_page' => TRUE,
              )
            );
          }
        }
      }
    }
  }
}


/**
 * Generate the HTML output for a menu link and submenu.
 *
 * @param $variables
 *   An associative array containing:
 *   - element: Structured array data for a menu link.
 *
 * @return
 *   A themed HTML string.
 *
 * @ingroup themeable
 */

function boilerplate_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  // Adding a class depending on the TITLE of the link (not constant)
  $element['#attributes']['class'][] = drupal_html_class($element['#title']);
  // Adding a class depending on the ID of the link (constant)
  if (isset($element['#original_link']['mlid']) && !empty($element['#original_link']['mlid'])) {
    $element['#attributes']['class'][] = 'mid-' . $element['#original_link']['mlid'];
  }
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/**
 * Override or insert variables into theme_menu_local_task().
 */
function boilerplate_preprocess_menu_local_task(&$variables) {
  $link =& $variables['element']['#link'];

  // If the link does not contain HTML already, check_plain() it now.
  // After we set 'html'=TRUE the link will not be sanitized by l().
  if (empty($link['localized_options']['html'])) {
    $link['title'] = check_plain($link['title']);
  }
  $link['localized_options']['html'] = TRUE;
  $link['title'] = '<span class="tab">' . $link['title'] . '</span>';
}

/*
 *  Duplicate of theme_menu_local_tasks() but adds clearfix to tabs.
 */

function boilerplate_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="tabs primary clearfix">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="tabs secondary clearfix">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }

  return $output;

}

// Add value to search form
function boilerplate_form_alter(&$form, &$form_state, $form_id) {
    if ($form_id == 'search_block_form') {
//        $form['search_block_form']['#title'] = t('Search'); // Change the text on the label element
//        $form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
//        $form['search_block_form']['#size'] = 40; // define size of the textfield
//        $form['search_block_form']['#default_value'] = t('Parkett Suche'); // Set a default value for the textfield
//        $form['actions']['submit']['#value'] = t('GO!'); // Change the text on the submit button
//        $form['actions']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() . '/images/search-button.png');

// Add extra attributes to the text box
//        $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
//        $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
// Prevent user from searching the default text
//        $form['#attributes']['onsubmit'] = "if(this.search_block_form.value=='Search'){ alert('Please enter a search'); return false; }";

// Alternative (HTML5) placeholder attribute instead of using the javascript
       $form['search_block_form']['#attributes']['placeholder'] = t('Suchbegriff eingeben...');
    }
}


// Insert a font-awesome icon to this field
function boilerplate_field__field_telefon($variables){
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables ['label_hidden']) {
    $output .= '<div class="field-label"' . $variables ['title_attributes'] . '>' . $variables ['label'] . ':&nbsp;</div>';
  }

  // Render the items.
  $output .= '<div class="field-items"' . $variables ['content_attributes'] . '>';
  foreach ($variables ['items'] as $delta => $item) {
    $classes = 'field-item ' . ($delta % 2 ? 'odd' : 'even');
    $output .= '<div class="' . $classes . '"' . $variables ['item_attributes'][$delta] . '>' . '<i class="fa fa-phone" title="Telefon"></i> ' . drupal_render($item) . '</div>';
  }
  $output .= '</div>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables ['classes'] . '"' . $variables ['attributes'] . '>' . $output . '</div>';

  return $output;
}


// Insert a font-awesome icon to this field
function boilerplate_field__field_telefax($variables){
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables ['label_hidden']) {
    $output .= '<div class="field-label"' . $variables ['title_attributes'] . '>' . $variables ['label'] . ':&nbsp;</div>';
  }

  // Render the items.
  $output .= '<div class="field-items"' . $variables ['content_attributes'] . '>';
  foreach ($variables ['items'] as $delta => $item) {
    $classes = 'field-item ' . ($delta % 2 ? 'odd' : 'even');
    $output .= '<div class="' . $classes . '"' . $variables ['item_attributes'][$delta] . '>' . '<i class="fa fa-file-text-o" title="Telefax"></i> ' . drupal_render($item) . '</div>';
  }
  $output .= '</div>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables ['classes'] . '"' . $variables ['attributes'] . '>' . $output . '</div>';

  return $output;
}

// Insert a font-awesome icon to this field
function boilerplate_field__field_e_mail($variables){
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables ['label_hidden']) {
    $output .= '<div class="field-label"' . $variables ['title_attributes'] . '>' . $variables ['label'] . ':&nbsp;</div>';
  }

  // Render the items.
  $output .= '<div class="field-items"' . $variables ['content_attributes'] . '>';
  foreach ($variables ['items'] as $delta => $item) {
    $classes = 'field-item ' . ($delta % 2 ? 'odd' : 'even');
    $output .= '<div class="' . $classes . '"' . $variables ['item_attributes'][$delta] . '>' . '<i class="fa fa-envelope"></i> ' . drupal_render($item) . '</div>';
  }
  $output .= '</div>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables ['classes'] . '"' . $variables ['attributes'] . '>' . $output . '</div>';

  return $output;
}

/*function boilerplate_page_alter(&$page) {
  //kpr($page);
  
  if (arg(0) == 'node' && is_numeric(arg(1))) {
    $nid = arg(1);
    if ($page['content']['system_main']['nodes'][$nid]['#bundle'] == 'filiale') {
      $map = $page['content']['system_main']['nodes'][$nid]['field_anfahrt'];
      array_unshift($page['highlight'], array('image' => $map));
      unset($page['content']['system_main']['nodes'][$nid]['field_anfahrt']);
    }
  }
}*/







