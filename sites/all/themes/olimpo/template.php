<?php
// $Id: template.php,v 1.16.2.3 2010/05/11 09:41:22 goba Exp $

/**
 * Sets the body-tag class attribute.
 *
 * Adds 'sidebar-left', 'sidebar-right' or 'sidebars' classes as needed.
 */
function phptemplate_body_class($left, $right) {
  if ($left != '' && $right != '') {
    $class = 'sidebars';
  }
  else {
    if ($left != '') {
      $class = 'sidebar-left';
    }
    if ($right != '') {
      $class = 'sidebar-right';
    }
  }

  if (isset($class)) {
    print ' class="'. $class .'"';
  }
}

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
function phptemplate_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    return '<div class="breadcrumb">'. implode(' › ', $breadcrumb) .'</div>';
  }
}

/**
 * Override or insert PHPTemplate variables into the templates.
 */
function olimpo_preprocess_page(&$vars) {
  if(drupal_get_path_alias($_GET['q']) == 'gimnasio/instalaciones' || $_GET['q'] == 'node') {
	jquery_plugin_add('cycle');
	if($_GET['q'] == 'node')
		drupal_add_js(drupal_get_path('theme', 'olimpo') . '/slider.js');
	else
		drupal_add_js(drupal_get_path('theme', 'olimpo') . '/slider2.js');
  }
}

/**
 * Add a "Comments" heading above comments except on forum pages.
 */
function olimpo_preprocess_comment_wrapper(&$vars) {
  if ($vars['content'] && $vars['node']->type != 'forum') {
    $vars['content'] = '<h2 class="comments">'. t('Comments') .'</h2>'.  $vars['content'];
  }
}

/**
 * Returns the rendered local tasks. The default implementation renders
 * them as tabs. Overridden to split the secondary tasks.
 *
 * @ingroup themeable
 */
function phptemplate_menu_local_tasks() {
  return menu_primary_local_tasks();
}

/**
 * Returns the themed submitted-by string for the comment.
 */
function phptemplate_comment_submitted($comment) {
  return t('!datetime — !username',
    array(
      '!username' => theme('username', $comment),
      '!datetime' => format_date($comment->timestamp)
    ));
}

/**
 * Returns the themed submitted-by string for the node.
 */
function phptemplate_node_submitted($node) {
  return t('!datetime — !username',
    array(
      '!username' => theme('username', $node),
      '!datetime' => format_date($node->created),
    ));
}

/**
 * Generates IE CSS links for LTR and RTL languages.
 */
function phptemplate_get_ie_styles() {
  global $language;

  $iecss = '<link type="text/css" rel="stylesheet" media="all" href="'. base_path() . path_to_theme() .'/fix-ie.css" />';
  if ($language->direction == LANGUAGE_RTL) {
    $iecss .= '<style type="text/css" media="all">@import "'. base_path() . path_to_theme() .'/fix-ie-rtl.css";</style>';
  }

  return $iecss;
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