<?php
require_once dirname(__FILE__) . '/inc/theme-settings-header.inc';
require_once dirname(__FILE__) . '/inc/theme-settings-presets.inc';
function creatrix_form_system_theme_settings_alter(&$form,&$form_state,$form_id = NULL) {
	creatrix_theme_settings_header($form,$form_state);
	//creatrix_theme_settings_preset($form,$form_state);
}