<?php
// $Id: page.tpl.php,v 1.13 2008/09/15 08:31:58 johnalbin Exp $

/**
 * @file page.tpl.php
 *
 * Theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the theme is located in, e.g. themes/garland or
 *   themes/garland/minelli.
 * - $is_front: TRUE if the current page is the front page. Used to toggle the mission statement.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $body_classes: A set of CSS classes for the BODY tag. This contains flags
 *   indicating the current layout (multiple columns, single column), the current
 *   path, whether the user is logged in, and so on.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been disabled.
 * - $primary_links (array): An array containing primary navigation links for the
 *   site, if they have been configured.
 * - $secondary_links (array): An array containing secondary navigation links for
 *   the site, if they have been configured.
 *
 * Page content (in order of occurrance in the default page.tpl.php):
 * - $left: The HTML for the left sidebar.
 *
 * - $breadcrumb: The breadcrumb trail for the current page.
 * - $title: The page title, for use in the actual HTML content.
 * - $help: Dynamic help text, mostly for admin pages.
 * - $messages: HTML for status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the view
 *   and edit tabs when displaying a node).
 *
 * - $content: The main content of the current Drupal page.
 *
 * - $right: The HTML for the right sidebar.
 *
 * Footer/closing data:
 * - $feed_icons: A string of all feed icons for the current page.
 * - $footer_message: The footer message as defined in the admin settings.
 * - $footer : The footer region.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic content.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 */
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 oldie"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="es-ES" class="no-js<?= isset($ribbon) ? ' has--takeover--ribbon' : ''; ?>"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php print $head_title; ?></title>
    <?php print $head; ?>
    <?php print $styles; ?>
    <!--[if lt IE 9]> <script type="text/javascript" src="<?= $base_path . $directory; ?>/js/modernizr.js"></script> <![endif]-->
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyled Content in IE */ ?> </script>
  </head>


  <body class="<?php print $body_classes; ?>">

    <a id="navigation-top"></a>

    <div class="container--wrapper" id="container--wrapper">

      <? require("$directory/mobile-menu.tpl.php"); ?>

      <div id="container" class="container">

        <? require("$directory/header.tpl.php"); ?>

        <div id="main" class="main" role="main">

          <? if (user_access('administer news')) : ?>
            <div class="gg-row">
              <ul class="frontpage-admin-menu">
                <li><?= l(t('Add news'), 'node/add/announcement', array('attributes' => array('class' => 'icon icon--add-news'))); ?></li>
                <li><?= l(t('Sort news'), 'admin/educapoker/educared', array('attributes' => array('class' => 'icon icon--order-news'))); ?></li>
              </ul>
            </div>
          <? endif; ?>

          <?php if (isset($tabs) && $tabs): ?>
            <div id="tabs-wrapper" class="clear-block">
              <?php print $tabs; ?>
            </div>
          <?php endif; ?>
          <?php if (isset($tabs2) && $tabs2): ?>
            <ul class="tabs secondary">
              <?php print $tabs2; ?>
            </ul>
          <?php endif; ?>

          <?php print $help; ?>
          <?php if (isset($tabss) && $tabbs): ?>
            <?php print $tabss['primary']; ?>
          <?php endif; ?>

          <?= ($show_messages && $messages) ? $messages : ''; ?>
          <?= isset($upper_content) ? $upper_content : ''; ?>

          <?= $content; ?>

          <?php if ($right): ?>
            <aside class="mainSidebar" id="sidebar">
              <?php print $right ?>
            </aside>
          <?php endif; ?>

          <?php if ($adminbar): ?>
            <div id="sidebarAdmin" class="sidebarAdmin">
              <?php print $adminbar ?>
            </div>
          <?php endif; ?>

          <?php if ($content_bottom): ?>
            <div class="clearfix"></div>
            <div id="content-bottom" class="region region-content_bottom">
              <?php print $content_bottom; ?>
            </div> <!-- /#content-bottom -->
          <?php endif; ?>

        </div>

      </div><!-- #container -->

    </div><!-- #container-wrapper -->

    <? require($directory . '/footer.tpl.php'); ?>

    <?php if ($closure_region): ?>
      <div id="closure-blocks" class="region region-closure"><?php print $closure_region; ?></div>
    <?php endif; ?>
    <?php print $scripts; ?>
    <?php print $closure; ?>

  </body>
</html>
