<article class="<?= $class ?> <?= $item->unpublish ? ' unpublished' : ''; ?>"  itemtype="http://schema.org/Article" itemscope>

  <?= theme('ep_educared_news_lead_in', $item->lead_in); ?>
  <?php if (isset($item->image) && $item->include_picture) : ?>
    <figure>
      <?= $image_link; ?>
      <? if (isset($item->caption) && trim($item->caption) != '') : ?>
        <figcaption><?= $item->caption; ?></figcaption>
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
