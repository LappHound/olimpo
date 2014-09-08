<?php die;?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>
<?php if (isset($ratio)): ?>data-stellar-background-ratio="<?php print $ratio; ?>"<?php endif; ?>>
	
	<div class="block-contents " <?php if (isset($animation)):?>data-appear-animation="<?php print $animation; ?>"<?php endif; ?>>
	  <?php print render($title_prefix); ?>
	<?php if ($block->subject): ?>
            <h3 class="block-title" <?php print $title_attributes; ?>><?php print $block->subject ?></h3>
	<?php endif;?>
	  <?php print render($title_suffix); ?>
	
	  <div class="content sh-block-content"<?php print $content_attributes; ?>>
	    <?php print $content ?>
	  </div>
	</div>
	<div style="clear:both" class="clear-fix"></div>
</div>