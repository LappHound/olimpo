<div class='gg-row' id="all_news">
  <div class="gg-62pc gg-column" id="left_news"></div>
  <div class="gg-38pc gg-column" id="right_news"></div>

  <? foreach ($items as $index => $item) : ?>
    <?= theme('frontpage_item', $item, 'article-standard ' . (($index % 2 != 0) ? 'left_news' : 'right_news')); ?>
  <? endforeach; ?>
</div>
