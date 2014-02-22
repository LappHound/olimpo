<!-- Logo -->
<div id="logo">
  <?php print $logo; ?>
</div>

<!-- Nav -->
<nav id="nav">
  <ul>
    <?php foreach ($menu as $item) : ?>
      <li><?php print $item; ?></li>
    <?php endforeach; ?>
  </ul>
</nav>

<!-- Search -->
<section class="is-search">
  <form method="post" action="#">
    <input type="text" class="text" name="search" placeholder="Search" />
  </form>
</section>

<!-- Text -->
<section class="is-text-style1">
  <div class="inner">
    <p>
      <strong>Striped:</strong> A free and fully responsive HTML5 site
      template designed by <a href="http://n33.co/">AJ</a> for <a href="http://html5up.net/">HTML5 up!</a>
    </p>
  </div>
</section>

<!-- Recent Posts -->
<section class="is-recent-posts">
  <header>
    <h2>Recent Posts</h2>
  </header>
  <ul>
    <li><a href="#">Nothing happened</a></li>
    <li><a href="#">My Dearest Cthulhu</a></li>
    <li><a href="#">The Meme Meme</a></li>
    <li><a href="#">Now Full Cyborg</a></li>
    <li><a href="#">Temporal Flux</a></li>
  </ul>
</section>

<!-- Recent Comments -->
<section class="is-recent-comments">
  <header>
    <h2>Recent Comments</h2>
  </header>
  <ul>
    <li>case on <a href="#">Now Full Cyborg</a></li>
    <li>molly on <a href="#">Untitled Post</a></li>
    <li>case on <a href="#">Temporal Flux</a></li>
  </ul>
</section>

<!-- Copyright -->
<div id="copyright">
  <p>
    &copy; 2013 An Untitled Site.<br />
    Images: <a href="http://n33.co">n33</a>, <a href="http://fotogrph.com">fotogrph</a><br />
    Design: <a href="http://html5up.net/">HTML5 UP</a>
  </p>
</div>
