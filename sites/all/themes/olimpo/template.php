<?php


/**
 * Override or insert PHPTemplate variables into the templates.
 */
function olimpo_preprocess_page(&$vars) {
    $scripts = drupal_add_js();
    if (_olimpo_use_new_jquery()) {
        $jquery_path = _olimpo_get_jquery_path();
        $new_jquery = array($jquery_path => $scripts['core']['misc/jquery.js']);
        $scripts['core'] = array_merge($new_jquery, $scripts['core']);
        unset($scripts['core']['misc/jquery.js']);
    }
    $vars['scripts'] = drupal_get_js('header', $scripts);
    $vars['main_menu'] = olimpo_theme_menu(array('main-menu--02', 'js__main-menu--02', 'mq-small--hidden'));
    $vars['left_menu'] = olimpo_theme_menu(array('rwd__main-menu'));
}


function _olimpo_use_new_jquery() {
    return arg(0) != 'admin' && arg(1) != 'add' && arg(2) != 'edit' && arg(0) != 'panels' && arg(0) != 'ctools' && arg(0) != 'imagecrop' && arg(0) != 'batch';
    ;
}


function _olimpo_get_jquery_path() {
    return drupal_get_path('theme', 'olimpo') . base_path() . "js/jquery/jquery-2.0.3.min.js";
}


function olimpo_theme_menu($classes = array()) {
  $class = implode(' ', $classes);
  $menu = olimpo_get_header_menu();
  $output = '';
  foreach ($menu as $item) {
    $item_attributes = olimpo_is_menu_item_active($item) ? ' class="active"' : '';
    $path = base_path() . $item['path_alias'];
    $output .= "<li><a href=\"$path\"$item_attributes>{$item['name']}</a></li>";
  }
  return "<ul class=\"$class\">$output</ul>";
}


function olimpo_get_header_menu() {
  return array(
    array(
      'name' => 'Noticias',
      'path' => 'noticias',
      'path_alias' => 'noticias'
    ),
    array(
      'name' => 'Gimnasio',
      'path' => 'node/14',
      'path_alias' => 'gimnasio'
    ),
    array(
      'name' => 'Imágenes',
      'path' => 'imagenes',
      'path_alias' => 'imagenes'
    ),
    array(
      'name' => 'Palmarés',
      'path' => 'record-book',
      'path_alias' => 'palmares'
    ),
    array(
      'name' => 'Contacto',
      'path' => 'contact',
      'path_alias' => 'contacto'
    ),
  );
}


function olimpo_is_menu_item_active($item) {
  return arg(0) == $item['path'];
}


function olimpo_preprocess_node(&$variables) {
    switch($variables['node']->type){
    case 'image':
        $sql = 'SELECT n.* FROM {node} n WHERE n.nid IN (SELECT tn.nid FROM {term_node} tn WHERE tn.nid != %d AND tn.tid IN (SELECT tnd.tid FROM {term_node} tnd WHERE tnd.nid = %d)) ORDER BY n.nid ASC';
        $result = db_query($sql, $variables['node']->nid, $variables['node']->nid);
        $para = $siguiente = $anterior = FALSE;
        while(($res = db_fetch_object($result)) && !$para) {
            if($res->nid < $variables['node']->nid)
                $anterior = $res->nid;
            if($res->nid > $variables['node']->nid) {
                $siguiente = $res->nid;
                $para = TRUE;
            }
        }
        $variables['siguiente'] = $siguiente;
        $variables['anterior'] = $anterior;
        break;
    }
}


function theme_facebook_share($url, $title, $text, $image = NULL, $link_text = 'Share', $class = 'btn btn-large btn-facebook') {
  $url = urlencode($url);
  $title = urlencode($title);
  $summary = urlencode($text);
  $image = urlencode($image);
  return "<a class=\"$class\" onClick=\"window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=$title&amp;p[summary]=$summary&amp;p[url]=$url&amp;&amp;p[images][0]=$image','sharer','toolbar=0,status=0,width=548,height=325');\" href=\"javascript: void(0)\">$link_text</a>";
}


function theme_twitter_share($url, $text, $link_text = 'Tweet', $class = 'btn btn-large btn-twitter') {
  $url = urlencode($url);
  $text = urlencode($text);
  return "<a class=\"$class\" onClick=\"window.open('http://twitter.com/share?url=$url&text=$text&via=poker_red','sharer','toolbar=0,status=0,width=548,height=325');\" href=\"javascript: void(0)\">$link_text</a>";
}


function theme_google_plus_share($url, $class = 'btn btn--share btn--share-googleplus') {
  $url = urlencode($url);
  return "<a class='$class' onClick=\"window.open('http://plus.google.com/share?url=$url','sharer','toolbar=0,status=0,width=548,height=325');\" href=\"javascript: void(0)\"></a>";
}
