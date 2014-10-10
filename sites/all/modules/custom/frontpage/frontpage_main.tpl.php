<?php
/**
 * @file
 * news screen.
 *
 */
?>

<? if (isset($special)) : ?>
  <div class='gg-row'>
    <?= theme('frontpage_item', $special, 'article-ultra', 'ultra'); ?>
  </div>
<? endif; ?>

<?= theme('frontpage_columns', $items); ?>

<div class="gg-row">
  <div class="go-to-archive">
    <p><a href="noticias">Noticias anteriores</a></p>
    <p class="note">Desde septiembre de 2010</p>
  </div>
</div>

<div class="gg-row last-front-section">

  <div class="gg-62pc gg-column">
    <a class="twitter-timeline"  href="https://twitter.com/deportivolimpo" data-widget-id="516262401356742656">Tweets por @deportivolimpo</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </div>

  <div class="gg-38pc gg-column">
    <div class="fb-like-box" data-href="https://www.facebook.com/pages/Deportivo-olimpo-sedavi/286962194763653" data-width="392" data-height="600" data-colorscheme="light" data-show-faces="false" data-header="true" data-stream="true" data-show-border="false"></div>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&appId=153404114813598&version=v2.0";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
  </div>

</div>
