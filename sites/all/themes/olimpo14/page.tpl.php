<!DOCTYPE HTML>
<html lang="<?php print $language->language ?>">
  <head>
    <?php print $head ?>
    <title><?php print $head_title ?></title>
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700|Open+Sans+Condensed:300,700" rel="stylesheet" />
    <?php print $scripts ?>
    <?php print $styles ?>
    <noscript>
      <link rel="stylesheet" href="/<?php print $theme_path; ?>/css/skel-noscript.css" />
      <link rel="stylesheet" href="/<?php print $theme_path; ?>/css/style.css" />
      <link rel="stylesheet" href="/<?php print $theme_path; ?>/css/style-desktop.css" />
      <link rel="stylesheet" href="/<?php print $theme_path; ?>/css/style-wide.css" />
    </noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="/<?php print $theme_path; ?>/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="/<?php print $theme_path; ?>/js/html5shiv.js"></script><link rel="stylesheet" href="/<?php print $theme_path; ?>/css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="/<?php print $theme_path; ?>/css/ie7.css" /><![endif]-->
  </head>

  <body class="left-sidebar">
    <div id="wrapper">
      <div id="content">
        <div id="content-inner">
          <?php print $content ?>
        </div>
      </div>
      <div id="sidebar">
        <?php print $sidebar; ?>
      </div>
    </div>
    <?php print $closure ?>
  </body>
</html>
