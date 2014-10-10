<footer class="main-footer">
  <div class="wrapper--980">
    <ul class="list--social-channels--02">
        <li>
          <?= l('Twitter','http://twitter.com/#!/deportivolimpo',array('attributes'=>array('class'=>'list--social__item list--social__item--twitter'),'query'=>array('utm_medium'=>'boton_footer','utm_campaing'=>'twitter','utm_source'=>'footer')))?>
        </li>
        <li>
          <?= l('Facebook','https://www.facebook.com/pages/Deportivo-olimpo-sedavi/286962194763653',array('attributes'=>array('class'=>'list--social__item list--social__item--facebook'),'query'=>array('utm_medium'=>'boton_footer','utm_campaing'=>'facebook','utm_source'=>'footer')))?>
        </li>
    </ul>
    <ul class="list--legal-info">
        <? if (user_is_anonymous()) : ?>
          <li><?= l(t('Login'), 'user/login', array('attributes' => array('class' => 'loginbox__link loginbox__link--login'))); ?></li>
        <? else : ?>
          <li><?= l(t('Log out'), 'logout', array('attributes' => array('class' => 'loginbox__link loginbox__link--logout'))); ?></li>
        <? endif; ?>
        <li><a href="/contact">Contacto</a></li>
        <li>Club Deportivo Olimpo Sedavi &copy; <?= date('Y', time()) ?></li>
    </ul>
  </div><!-- .wrapper -->
</footer>
