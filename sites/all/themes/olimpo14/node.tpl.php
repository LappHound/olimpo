<article class="is-post is-post-excerpt" id="node-<?php print $node->nid; ?>">
  <header>
    <h2><?php print l($title, "node/$node->nid", array('html' => TRUE)); ?></h2>
    <span class="byline"></span>
  </header>
  <div class="info">
    <span class="date">
      <span class="month"><?php print $creation_month; ?></span>
      <span class="day"><?php print $creation_day; ?></span>
      <span class="year"><?php print $creation_year; ?></span>
    </span>
    <ul class="stats">
      <li><a href="#" class="fa fa-comment">16</a></li>
      <li><a href="#" class="fa fa-twitter">64</a></li>
      <li><a href="#" class="fa fa-facebook">128</a></li>
    </ul>
  </div>
  <?php print $content; ?> 
</article>
