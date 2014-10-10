<?php
// $Id$

/**
 * @file header.tpl.php
 *
 * Theme implementation to display header.
 */
?>

<header class="main-header">
  <?= isset($userbar) && $userbar ? $userbar : '' ?>

  <nav class="main-nav--02">
    <div class="main-nav--02__area-logo">
      <div class="wrapper--980">
        <a href="/" class="main-logo--02">Club Deportivo Olimpo Sedavi</a>
        <ul class="mq-big--hidden rwd--menu">
          <li><a href="/" class="rwd--menu__item rwd--menu__item--logo js__rwd--menu__item--logo">Club Deportivo Olimpo Sedavi</a></li>
          <li><a href="#" class="rwd--menu__item rwd--menu__item--menu js__rwd--menu__item-menu js__menu--launch-menu">Menu</a></li>
          <li><a href="#" class="rwd--menu__item rwd--menu__item--search js__rwd--menu__item-search">Buscar</a></li>
          <li><a href="/user" class="rwd--menu__item rwd--menu__item--user js__rwd--menu__item-profile">Perfil</a></li>
        </ul>
      </div><!-- .wrapper -->
    </div>
    <div class="main-nav--02__area-menu">
      <div class="wrapper--980">
        <?= isset($main_menu) ? $main_menu : '' ?>
        <ul class="list--social-channels--02">
            <li>
              <?= l('Twitter','http://twitter.com/#!/deportivolimpo',array('attributes'=>array('class'=>'list--social__item list--social__item--twitter'),'query'=>array('utm_medium'=>'boton_footer','utm_campaing'=>'twitter','utm_source'=>'footer')))?>
            </li>
            <li>
              <?= l('Facebook','https://www.facebook.com/pages/Deportivo-olimpo-sedavi/286962194763653',array('attributes'=>array('class'=>'list--social__item list--social__item--facebook'),'query'=>array('utm_medium'=>'boton_footer','utm_campaing'=>'facebook','utm_source'=>'footer')))?>
            </li>
        </ul>
      </div>
    </div>
  </nav>


  <?= isset($top) && $top ? $top : '' ?>
</header>
