<div class="node node-<?= $node->type; ?>">
  <?php if (isset($banner)) : ?><?= $banner; ?><?php endif; ?>

  <? if (!isset($hide_title) || $hide_title === FALSE) : ?>
    <header>
      <h1><?= $node->title; ?></h1><?= isset($twitter) ? "<span class=\"twitter\">$twitter</span>" : ''; ?>
    </header>
  <? endif; ?>

  <?= $content; ?>

  <? if (isset($disqus_comments)) : ?>
    <?= $disqus_comments; ?>
  <? endif; ?>
</div>
