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
}


function _olimpo_use_new_jquery() {
    return arg(0) != 'admin' && arg(1) != 'add' && arg(2) != 'edit' && arg(0) != 'panels' && arg(0) != 'ctools' && arg(0) != 'imagecrop' && arg(0) != 'batch';
    ;
}


function _olimpo_get_jquery_path() {
    return drupal_get_path('theme', 'olimpo') . base_path() . "js/jquery/jquery-2.0.3.min.js";
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
