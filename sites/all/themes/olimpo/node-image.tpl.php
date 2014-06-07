<?php
// $Id: node.tpl.php,v 1.5 2007/10/11 09:51:29 goba Exp $
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">

<?php print $picture ?>

<?php if ($page == 0): ?>
  <h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
<?php endif; ?>

  <?php if ($submitted): ?>
    <span class="submitted"><?php print $submitted; ?></span>
  <?php endif; ?>
  
  <div class="clear-block">
    <div class="meta">
    <?php if ($taxonomy): ?>
      <div class="terms" style="display: block; margin: auto;">Galer&iacute;a: <?php print $terms ?></div>
    <?php endif;?>
    </div>
  </div>

  <div class="content node-image clear-block">	
    <?php print $content ?>
	<?php if ($links): ?>
      <div style="text-align: center;"><?php print $links; ?></div>
    <?php endif; ?>
	<?php if($anterior): ?>
		<?php print l('Anterior', 'node/' . $anterior, array('attributes' => array('class' => 'move_left'))); ?>
	<?php endif; ?>
	<?php if($siguiente): ?>
		<?php print l('Siguiente', 'node/' . $siguiente, array('attributes' => array('class' => 'move_right'))); ?>
	<?php endif; ?>
  </div>

</div>
