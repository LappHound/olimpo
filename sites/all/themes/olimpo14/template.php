<?php


function olimpo14_preprocess_node(&$variables) {
  $creation_date = date('j/M/Y', $variables['node']->created);
  list($variables['creation_day'], $variables['creation_month'], $variables['creation_year']) = explode('/', $creation_date);
}


function olimpo14_preprocess_page(&$variables) {
  $variables['theme_path'] = drupal_get_path('theme', 'olimpo14');
  $logo = $variables['theme_path'] . base_path() . 'logo.png';
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
