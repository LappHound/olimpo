<?php
/**
 * Custom Galeria Template settings
 */
 
/**
 * page alter
 */
function creatrix_page_alter(&$vars) {
	// Add custom varibales for scss
	$theme = superhero_get_theme();
	$theme->custom['header_height'] = theme_get_setting('superhero_header_height');
	$theme->custom['header_fixed_height'] = theme_get_setting('superhero_header_fixed_height');
	$theme->custom['custom_color_main_lighter'] = $theme->settings['custom_color_main_lighter'];
	$theme->custom['custom_color_header_background'] = $theme->settings['custom_color_header_background'];
	$theme->custom['custom_color_header_link'] = $theme->settings['custom_color_header_link'];
	$theme->custom['custom_color_background'] = $theme->settings['custom_color_background'];
	$theme->custom['custom_color_button_link'] = $theme->settings['custom_color_button_link'];
	$theme->custom['custom_color_bottom_background'] = $theme->settings['custom_color_bottom_background'];
	$theme->custom['custom_color_footer_background'] = $theme->settings['custom_color_footer_background'];
	// Remove content from front page
	if (drupal_is_front_page()) {
		unset($vars['data']['content']);
	}
}

function creatrix_preprocess_page(&$variables) {
  if (!empty($variables['node']) && $variables['node']->type == 'article') {
    $variables['title'] = FALSE;
  }
}

/**
 * Preprocess node
 */
function creatrix_preprocess_node(&$vars) {
  $node = $vars['node'];
  if ($vars['view_mode'] == 'teaser_alt') {
    $vars['theme_hook_suggestions'][] = 'node__' . $node->type . '__teaser__alt';
    $vars['theme_hook_suggestions'][] = 'node__' . $node->nid . '__teaser_alt';
  }
}

function creatrix_preprocess_taxonomy_term($vars){
	
}