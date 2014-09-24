<footer class="main-footer">
  <div class="wrapper--980">
    <ul class="list--social-channels--02">
        <li>
          <?= l('Twitter','http://twitter.com/#!/poker_red',array('attributes'=>array('class'=>'list--social__item list--social__item--twitter'),'query'=>array('utm_medium'=>'boton_footer','utm_campaing'=>'twitter','utm_source'=>'footer')))?>
        </li>
        <li>
          <?= l('Facebook','https://www.facebook.com/PokerRed.Social',array('attributes'=>array('class'=>'list--social__item list--social__item--facebook'),'query'=>array('utm_medium'=>'boton_footer','utm_campaing'=>'facebook','utm_source'=>'footer')))?>
        </li>
        <li>
          <?= l('YouTube','http://www.youtube.com/user/PokerRedTV',array('attributes'=>array('class'=>'list--social__item list--social__item--youtube'),'query'=>array('utm_medium'=>'boton_footer','utm_campaing'=>'youtube','utm_source'=>'footer')))?>
        </li>
        <li>
          <?= l('Flickr','http://www.flickr.com/photos/poker-red/',array('attributes'=>array('class'=>'list--social__item list--social__item--flickr'),'query'=>array('utm_medium'=>'boton_footer','utm_campaing'=>'flickr','utm_source'=>'footer')))?>
        </li>
        <li>
          <?= l('RSS','http://feeds.feedburner.com/poker-red',array('attributes'=>array('class'=>'list--social__item list--social__item--rss'),'query'=>array('utm_medium'=>'boton_footer','utm_campaing'=>'rss','utm_source'=>'footer')))?>
        </li>
    </ul>
    <ul class="list--legal-info">
    	<li><a href="/contact">Contacto</a></li>
    	<li><a href="/aviso-legal">Aviso legal</a></li>
    	<li>Club Deportivo Olimpo Sedavi &copy; <?= date('Y', time()) ?></li>
    </ul>
  </div><!-- .wrapper -->
</footer>
