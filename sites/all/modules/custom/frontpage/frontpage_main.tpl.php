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

<div class='gg-row'>
  <div class="gg-38pc gg-column">
    https://www.facebook.com/pages/Deportivo-olimpo-sedavi/286962194763653
  </div>
  <div class="gg-62pc gg-column">
    <a class="twitter-timeline"  href="https://twitter.com/deportivolimpo" data-widget-id="516262401356742656">Tweets por @deportivolimpo</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </div>
</div>
