<?php if (!empty($news)) : ?>
<div class="latest-news">
	<h3>Últimas noticias</h3>
	<ul>
		<?php foreach($news as $new) : ?>
		<li>
			<?php print $new['link'] ?> <span><?php print $new['date'] ?></span>
		</li>
		<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>