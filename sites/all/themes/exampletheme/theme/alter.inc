<?php

/**
 * @file
 * template.php
 * 
 * Contains various implementations of hook_*_alter().
 **/




function bootstrap_form_alter(array &$form, array &$form_state = array(), $form_id = NULL) {
  if ($form_id) {
    // IDs of forms that should be ignored. Make this configurable?
    // @todo is this still needed?
    $form_ids = array(
      'node_form',
      'system_site_information_settings',
      'user_profile_form',
      'node_delete_confirm',
    );
    // Only wrap in container for certain form.
    if (!in_array($form_id, $form_ids) && !isset($form['#node_edit_form']) && isset($form['actions']) && isset($form['actions']['#type']) && ($form['actions']['#type'] == 'actions')) {
      $form['actions']['#theme_wrappers'] = array();
    }

    switch ($form_id) {
      case 'system_theme_settings':
        // Include the settings form here.
        bootstrap_include('bootstrap', 'theme/settings.inc');
        _bootstrap_settings_form($form, $form_state);
        break;

      case 'search_form':
        // Add a clearfix class so the results don't overflow onto the form.
        $form['#attributes']['class'][] = 'clearfix';

        // Remove container-inline from the container classes.
        $form['basic']['#attributes']['class'] = array();

        // Hide the default button from display.
        $form['basic']['submit']['#attributes']['class'][] = '';

        // Implement a theme wrapper to add a submit button containing a search
        // icon directly after the input element.
        $form['basic']['keys']['#theme_wrappers'] = array('bootstrap_search_form_wrapper');
        $form['basic']['keys']['#title'] = '';
        $form['basic']['keys']['#attributes']['placeholder'] = t('Search');
        break;

      case 'search_block_form':
        $form['#attributes']['class'][] = 'form-search';

        $form['search_block_form']['#title'] = '';
        $form['search_block_form']['#attributes']['placeholder'] = t('Search');

        // Hide the default button from display and implement a theme wrapper
        // to add a submit button containing a search icon directly after the
        // input element.
        $form['actions']['submit']['#attributes']['class'][] = 'element-invisible';
        $form['search_block_form']['#theme_wrappers'] = array('bootstrap_search_form_wrapper');

        // Apply a clearfix so the results don't overflow onto the form.
        $form['#attributes']['class'][] = 'content-search';
        break;
    }

  }
}