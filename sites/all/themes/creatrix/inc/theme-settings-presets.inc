<?php

/**
 * Add colour settings to superhero framework
 */
function creatrix_theme_settings_preset(&$form,&$form_state) {
	$color_attrs = array(
		'class' => array(
			'colorpicker',
			'perset-option'
		)
	);
	$form['superhero_settings']['preset_settings']['custom_color_main_lighter'] = array(
		'#type' => 'textfield',
		'#title' => t('Main Color Lighter'),
		'#default_value' => '',
		'#attributes' => $color_attrs
	);
	$form['superhero_settings']['preset_settings']['custom_color_header_background'] = array(
		'#type' => 'textfield',
		'#title' => t('Header Background Color'),
		'#attributes' => $color_attrs
	);
	$form['superhero_settings']['preset_settings']['custom_color_header_link'] = array(
		'#type' => 'textfield',
		'#title' => t('Header Link Color'),
		'#attributes' => $color_attrs
	);
	$form['superhero_settings']['preset_settings']['custom_color_background'] = array(
		'#type' => 'textfield',
		'#title' => t('Background Color'),
		'#attributes' => $color_attrs
	);
	$form['superhero_settings']['preset_settings']['custom_color_button_link'] = array(
		'#type' => 'textfield',
		'#title' => t('This color set for Link and Button'),
		'#attributes' => $color_attrs
	);
	$form['superhero_settings']['preset_settings']['custom_color_bottom_background'] = array(
		'#type' => 'textfield',
		'#title' => t('Bottom background Color'),
		'#attributes' => $color_attrs
	);
	$form['superhero_settings']['preset_settings']['custom_color_footer_background'] = array(
		'#type' => 'textfield',
		'#title' => t('Footer background Color'),
		'#attributes' => $color_attrs
	);
}