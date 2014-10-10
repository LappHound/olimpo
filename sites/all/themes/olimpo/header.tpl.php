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
        <ul class="loginbox">
          <? if (user_is_anonymous()) : ?>
            <li><?= l(t('Login'), 'user/login', array('attributes' => array('class' => 'loginbox__link loginbox__link--login'))); ?></li>
          <? else : ?>
            <li><?= l($user->name, "user/$user->uid", array('attributes' => array('class' => 'loginbox__link'))); ?></li>
            <li><?= l(t('Log out'), 'logout', array('attributes' => array('class' => 'loginbox__link loginbox__link--logout'))); ?></li>
          <? endif; ?>
        </ul>
      </div><!-- .wrapper -->
    </div>
    <div class="main-nav--02__area-menu">
      <div class="wrapper--980">
        <?= isset($main_menu) ? $main_menu : '' ?>
        <?= $search_form ?>
      </div>
    </div>
  </nav>


  <?= isset($top) && $top ? $top : '' ?>
</header>
