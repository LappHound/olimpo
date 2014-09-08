<div id="node-<?php print $node->nid; ?>" class="me-team <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <div class="team-body">
        <?php print render($content['body']); ?>
    </div>
    <div class="ArrowWrap"><span class="arrow"></span></div>
    <div class="team-avatar">
        <?php print render($content['field_image'][0]); ?>
    </div>
    <div class="team-name">
        <h3 class="title header"><?php print $title; ?></h3>
    </div>
</div>