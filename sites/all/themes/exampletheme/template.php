<?php



/**
 * Implements hook_form_alter().
 */
function exampletheme_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
    $form['search_block_form']['#title'] = t('Search'); // Change the text on the label element
    $form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
    //$form['search_block_form']['#size'] = 40;  // define size of the textfield
    $form['search_block_form']['#default_value'] = t('Search'); // Set a default value for the textfield
    //$form['actions']['submit']['#value'] = t('GO!'); // Change the text on the submit button
    $form['actions']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() . '/immagini/btnCerca.png');
    // Add extra attributes to the text box
    $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Cerca';}";
    $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Cerca') {this.value = '';}";
  }
}


/**
 * Implements hook_theme_registry_alter().
 */
function exampletheme_theme_registry_alter(&$theme_registry) {
    // Defined path to the current module.
    $module_path = drupal_get_path('theme', 'exampletheme');
    // Find all .tpl.php files in this module's folder recursively.
    $template_file_objects = drupal_find_theme_templates($theme_registry, '.tpl.php', $module_path);
    // Iterate through all found template file objects.
    foreach ($template_file_objects as $key => $template_file_object) {
        // If the template has not already been overridden by a theme.
        if (!isset($theme_registry[$key]['theme path']) || !preg_match('#/themes/#', $theme_registry[$key]['theme path'])) {
            // Alter the theme path and template elements.
            $theme_registry[$key]['theme path'] = $module_path;
            $theme_registry[$key] = array_merge($theme_registry[$key], $template_file_object);
            $theme_registry[$key]['type'] = 'theme';
        }
    }
}

function exampletheme_preprocess_page (&$variables){
    if (isset($variables['node']->type)) {
        // If the content type's machine name is "my_machine_name" the file
        // name will be "page--my-machine-name.tpl.php".
        $variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;
    }
}

function exampletheme_menu_alter(&$items) {
  //condition to check the user
  global $user;
  if($user->id == null) { //can use $user->name as well
    $items['user/password']['access callback'] = FALSE;
  }
}
