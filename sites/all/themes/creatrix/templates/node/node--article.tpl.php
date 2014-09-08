<div id="node-<?php print $node->nid; ?>" class="sh-blog <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <div class="catItemHeader ItemHeader clearfix">
        <div class="ItemHeader-inner itemdetail">
            <div class="ItemDate text-center left">
                <span class="date"><?php print format_date($created, 'custom', 'd'); ?></span>
                <span class="month"><?php print format_date($created, 'custom', 'M'); ?></span>
            </div>
            <h2 class="blog-content-tile left" <?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>

            <div class="ItemInfo right">
                <!-- Item Author Avatar-->
                <div style="width: 50px; margin-top: 2.5px;" class="ItemAuthorAvatarWrap right">
                    <?php print $user_picture; ?>
                </div>
                <div style="padding-right: 60px; text-align: right; margin-top: 16.5px;" class="ItemInfoText">  
                    <div class="ItemAuthor entry-info by-author">
                        <i class="fa fa-user"></i> <?php print $name; ?>
                    </div>
                    <div class="ItemAuthor entry-info by-tags">
                        <i class="fa fa-folder"></i> <?php print render($content['field_tags']); ?>
                    </div>
                    <div class="ItemAuthor entry-info by-comment-count">
                        <i class="fa fa-comments"></i> <?php print $comment_count; ?>
                    </div>
                </div>  
            </div>
        </div>
    </div>
    <div class="blog-image clearfix">
        <div class="boxShadow-">
            <?php print render($content['field_image']); ?>
        </div>
    </div>
    
    <div class="blog-content content"<?php print $content_attributes; ?>>
        <?php print render($content['body']); ?>
        <?php
        // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        //print render($content);
        ?>
    </div>

    <?php print render($content['links']); ?>
    <?php print render($content['comments']); ?>
</div>