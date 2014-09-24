<div class="rwd__main-header">
  <a class="rwd-btn rwd-btn--menu-toggle">MOVER</a>
  <a href="/" class="pr__logo">Poker-Red</a>
</div>

<nav class="rwd__main-nav">
  <div class="login-area">
    <? if (user_is_anonymous()) : ?>
      <?= l(t('Login'), 'user/login', array('attributes' => array('class' => 'loginbox__link loginbox__link--login'))); ?>
      <?= l(t('Register'), 'user/register', array('attributes' => array('class' => 'loginbox__link'))); ?>
    <? else : ?>
      <?= l($user->name, "user/$user->uid", array('attributes' => array('class' => 'loginbox__link'))); ?>
      <?= l(t('Log out'), 'logout', array('attributes' => array('class' => 'loginbox__link loginbox__link--logout'))); ?>
    <? endif; ?>
  </div>
  <?= $sidebar_search_form; ?>
  <?= isset($left_menu) ? $left_menu : '' ?>
</nav><!-- rwd__main-nav -->
