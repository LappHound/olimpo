<?php


function olimpo14_preprocess_node(&$variables) {
  $creation_date = date('j/M/Y', $variables['node']->created);
  list($variables['creation_day'], $variables['creation_month'], $variables['creation_year']) = explode('/', $creation_date);
  if (drupal_is_front_page()) {
    array_unshift($variables['template_files'], 'node-frontpage');
  }
}


function olimpo14_preprocess_page(&$variables) {
  $variables['theme_path'] = drupal_get_path('theme', 'olimpo14');
  $variables['logo'] = theme('image', $variables['theme_path'] . base_path() . 'logo.png', 'Club Deportivo Olimopo Sedaví', 'Club Derportivo Olimpo Sedaví');
  $variables['menu'] = array(
    l('Home', '<front>'),
    l('Noticias', 'news'),
    l('Sobre nosotros', 'about'),
    l('Más cosas', 'more')
  );
}


function olimpo14_theme() {
  return array(
    'sidebar' => array(
      'template' => 'sidebar',
      'arguments' => array('logo' => NULL, 'menu' => array())
    )
  );
}


function ak_debug($output) {
  drupal_set_message('<pre>' . print_r($output, TRUE) . '</pre>');
}
