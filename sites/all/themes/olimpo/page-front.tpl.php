<?php
// $Id: page.tpl.php,v 1.18.2.1 2009/04/30 00:13:31 goba Exp $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
    <?php print $head ?>
    <title><?php print $head_title ?></title>
    <?php print $styles ?>
    <?php print $scripts ?>
    <!--[if lt IE 7]>
      <?php print phptemplate_get_ie_styles(); ?>
    <![endif]-->
  </head>
  <body<?php print phptemplate_body_class($left, $right); ?>>

<!-- Layout -->

    <div id="wrapper">
    <div id="container" class="clear-block">

      <div id="header">
		<?php if ($logged_in) : ?>
			<a href="/logout" style="float: right; color: white; margin-top: 5px;">Logout</a>
		<?php else : ?>
			<a href="/user/login" style="float: right; color: white; margin-top: 5px;">Login</a>
		<?php endif; ?>	  
		<?php require('header.tpl.php'); ?>
      </div> <!-- /header -->

      <?php if ($left): ?>
        <div id="sidebar-left" class="sidebar">
          <?php if ($search_box): ?><div class="block block-theme"><?php print $search_box ?></div><?php endif; ?>
          <?php print $left ?>
        </div>
      <?php endif; ?>

      <div id="center"><div id="squeeze"><div class="right-corner"><div class="left-corner">
          <?php print $breadcrumb; ?>
          <?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
          <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
          <?php if ($title): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h2>'; endif; ?>
          <?php if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
          <?php if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
          <?php if ($show_messages && $messages): print $messages; endif; ?>
          <?php print $help; ?>
          <div class="clear-block">
			  <div class="content">            
	
				<div id="intro">
				
				<h1>Presentaci&oacute;n </h1>
				
				<p>El Club de Taekwondo Olimpo Sedavi nace en junio de 2010 gracias a la ilusi&oacute;n y apoyo de todos nuestros alumnos y amigos, que nos han animado a constituirlo, tras m&aacute;s de 15 a&ntilde;os entrenando en diferentes pueblos (Paiporta, Torrent, Alfafar, Sedavi, Valencia y Catarroja) y estando federados por otros clubes de Taekwondo.
				En la actualidad y a pesar de nuestra corta trayectoria como club propio, podemos afirmar que el Club de Taekwondo Olimpo Sedavi es uno de los mejores clubes de toda la Comunidad Valenciana, ya que contamos con muchos campeones regionales, varios campeones de Espa&ntilde;a y con un medallista a nivel internacional.</p>
				<p>Durante las &uacute;ltimas temporadas, gracias al esfuerzo de los competidores y entrenadores, hemos conseguido ser campeones por equipos a nivel auton&oacute;mico en todas las categor&iacute;as.</p>
				<p>Contamos con entrenadores de la talla de Francisco Mart&iacute;n Torres, campe&oacute;n de Espa&ntilde;a de Taekwondo y entrenador de la comunidad valenciana en varias ocasiones, as&iacute; como Jaime Segu&iacute; 5&#176; Dan de Kajukenbo  y delegado para la C. Valenciana en esta disciplina.</p>
				<p>Nuestras instalaciones disponen de dos salas de 100 m&sup2;: una de parquet y otra con tatami, vestuarios y una sala de ocio con revistas, cuentos infantiles y televisi&oacute;n para que los familiares puedan descansar mientras los ni&ntilde;os realizan las clases.
				Como caracter&iacute;stica diferenciadora de otros gimnasios, la zona de tatami cuenta con una pantalla gigante para el an&aacute;lisis de combates, preparaci&oacute;n de exhibiciones o la impartici&oacute;n de clases te&oacute;ricas.</p>
				<p><strong>Os esperamos a todos.</strong></p>
				
				</div><!--introduction end-->
				
				<div class="pics">
					<img src="<?php print(drupal_get_path('theme', 'olimpo') . '/images/img1.jpg'); ?>" height="250" width="500"/>
					<img src="<?php print(drupal_get_path('theme', 'olimpo') . '/images/img2.jpg'); ?>" height="250" width="500"/>
					<img src="<?php print(drupal_get_path('theme', 'olimpo') . '/images/img3.jpg'); ?>" height="250" width="500"/>
					<img src="<?php print(drupal_get_path('theme', 'olimpo') . '/images/img4.jpg'); ?>" height="250" width="500"/>
					<img src="<?php print(drupal_get_path('theme', 'olimpo') . '/images/img5.jpg'); ?>" height="250" width="500"/>
					<img src="<?php print(drupal_get_path('theme', 'olimpo') . '/images/img6.jpg'); ?>" height="250" width="500"/>
				</div>
				
            </div><!--content end-->
          </div>

          <div id="footer"><?php print $footer_message . $footer ?></div>
      </div></div></div></div> <!-- /.left-corner, /.right-corner, /#squeeze, /#center -->

      <?php if ($right): ?>
        <div id="sidebar-right" class="sidebar">
          <?php if (!$left && $search_box): ?><div class="block block-theme"><?php print $search_box ?></div><?php endif; ?>
          <?php print $right ?>
        </div>
      <?php endif; ?>
	  
    </div> <!-- /container -->
  </div>
<!-- /layout -->

  <?php print $closure ?>
  </body>
</html>
