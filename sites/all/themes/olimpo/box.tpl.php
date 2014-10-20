<?php

/**
 * @file box.tpl.php
 *
 * Theme implementation to display a box.
 *
 * Available variables:
 * - $title: Box title.
 * - $content: Box content.
 *
 * @see template_preprocess()
 */
?>
<div class="box">

  <?php if ($title): ?>
    <h1><?php print $title ?></h1>
  <?php endif; ?>

  <div class="content"><?php print $content ?></div>
</div>
