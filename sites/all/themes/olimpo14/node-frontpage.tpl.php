<div class="4u">
  <section class="box box-feature" id="node-<?php print $node->nid; ?>">
    <?php if (isset($picture)) : ?>
      <?php print l($picture, "", array('html' => TRUE, 'attributes' => array('class' => 'image image-full'))); ?>
    <?php endif; ?>
    <div class="inner">
      <header>
        <h2><?php print l($title, "node/$node->nid", array('html' => TRUE)); ?></h2>
        <span class="byline"><?php print $created_at; ?></span>
      </header>
      <?php print $content; ?>
    </div>
  </section>
</div>
