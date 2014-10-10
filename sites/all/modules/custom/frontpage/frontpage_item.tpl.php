<article class="item <?= $class ?> <?= $item->unpublish ? ' unpublished' : ''; ?>"  itemtype="http://schema.org/Article" itemscope>

  <?= theme('ep_educared_news_lead_in', $item->lead_in); ?>
  <?php if (isset($image_link)) : ?>
    <figure>
      <?= $image_link; ?>
      <? if (isset($image_caption)) : ?>
        <figcaption><?= $image_caption; ?></figcaption>
      <? endif; ?>
    </figure>
  <?php endif; ?>

  <header>
    <h2 class="heading" itemprop="name">
      <?= $title_link; ?>
    </h2>
    <?= theme('ep_educared_news_metadata', $item); ?>
  </header>
  <p><?= $item->drophead; ?></p>
</article>
