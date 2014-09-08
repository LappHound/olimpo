<!DOCTYPE HTML>
<html lang="<?php print $language->language ?>">
  <head>
    <?php print $head ?>
    <title><?php print $head_title ?></title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,800" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Oleo+Script:400" rel="stylesheet" type="text/css" />
    <?php print $scripts ?>
    <?php print $styles ?>
    <noscript>
      <link rel="stylesheet" href="/<?php print $theme_path; ?>/css/skel-noscript.css" />
      <link rel="stylesheet" href="/<?php print $theme_path; ?>/css/style.css" />
      <link rel="stylesheet" href="/<?php print $theme_path; ?>/css/style-desktop.css" />
    </noscript>
		<!--[if lte IE 8]><script src="/<?php print $theme_path; ?>/js/html5shiv.js"></script><link rel="stylesheet" href="/<?php print $theme_path; ?>/css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="/<?php print $theme_path; ?>/css/ie7.css" /><![endif]-->
  </head>

  <body class="homepage">
    <!-- Header Wrapper -->
    <div id="header-wrapper">
      <div class="container">
        <div class="row">
          <div class="12u">
            <!-- Header -->
            <header id="header">
              <!-- Logo -->
              <div id="logo">
                <h1><a href="/" class="logo"><?php print $logo; ?></a></h1>
                <span>Club Deportivo Olimpo Sedaví</span>
              </div>
              <!-- Nav -->
              <nav id="nav">
                <ul>
                  <?php foreach ($menu as $item) : ?>
                    <li><?php print $item; ?></li>
                  <?php endforeach; ?>
                </ul>
                <ul>
              </nav>
            </header>
          </div>
        </div>
      </div>
    </div>
    <?php if (!empty($messages)): print $messages; endif; ?>
    <!-- Main Wrapper -->
      <div id="<?php print drupal_is_front_page() ? 'feature-wrapper' : 'main-wrapper'; ?>">
      <div class="container">
        <div class="row">
          <?php print $content ?>
        </div>
      </div>
    </div>
    <!-- Footer Wrapper -->
    <div id="footer-wrapper">
      <footer id="footer" class="container">
        <div class="row">
          <div class="3u">
            <!-- Links -->
              <section class="widget-links">
                <h2>Random Stuff</h2>
                <ul class="style2">
                  <li><a href="#">Etiam feugiat condimentum</a></li>
                  <li><a href="#">Aliquam imperdiet suscipit odio</a></li>
                  <li><a href="#">Sed porttitor cras in erat nec</a></li>
                  <li><a href="#">Felis varius pellentesque potenti</a></li>
                  <li><a href="#">Nullam scelerisque blandit leo</a></li>
                </ul>
              </section>
          </div>
          <div class="3u">
            <!-- Links -->
              <section class="widget-links">
                <h2>Random Stuff</h2>
                <ul class="style2">
                  <li><a href="#">Etiam feugiat condimentum</a></li>
                  <li><a href="#">Aliquam imperdiet suscipit odio</a></li>
                  <li><a href="#">Sed porttitor cras in erat nec</a></li>
                  <li><a href="#">Felis varius pellentesque potenti</a></li>
                  <li><a href="#">Nullam scelerisque blandit leo</a></li>
                </ul>
              </section>
          </div>
          <div class="3u">
            <!-- Links -->
              <section class="widget-links">
                <h2>Random Stuff</h2>
                <ul class="style2">
                  <li><a href="#">Etiam feugiat condimentum</a></li>
                  <li><a href="#">Aliquam imperdiet suscipit odio</a></li>
                  <li><a href="#">Sed porttitor cras in erat nec</a></li>
                  <li><a href="#">Felis varius pellentesque potenti</a></li>
                  <li><a href="#">Nullam scelerisque blandit leo</a></li>
                </ul>
              </section>
          </div>
          <div class="3u">
            <!-- Contact -->
              <section class="widget-contact last">
                <h2>Contact Us</h2>
                <ul>
                  <li><a href="#" class="fa fa-twitter solo"><span>Twitter</span></a></li>
                  <li><a href="#" class="fa fa-facebook solo"><span>Facebook</span></a></li>
                  <li><a href="#" class="fa fa-dribbble solo"><span>Dribbble</span></a></li>
                  <li><a href="#" class="fa fa-google-plus solo"><span>Google+</span></a></li>
                </ul>
                <p>1234 Fictional Road Suite #5432<br />
                Nashville, Tennessee 00000-0000<br />
                (800) 555-0000</p>
              </section>
          </div>
        </div>
        <div class="row">
          <div class="12u">
            <div id="copyright">
              &copy; Untitled. All rights reserved. | Images: <a href="http://fotogrph.com/">fotogrph</a> | Design: <a href="http://html5up.net/">HTML5 UP</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <?php print $closure ?>
  </body>
</html>
