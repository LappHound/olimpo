<?php
// $Id: node.tpl.php,v 1.4 2008/09/15 08:11:49 johnalbin Exp $

/**
 * @file node.tpl.php
 *
 * Theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: Node body or teaser depending on $teaser flag.
 * - $picture: The authors picture of the node output from
 *   theme_user_picture().
 * - $date: Formatted creation date (use $created to reformat with
 *   format_date()).
 * - $links: Themed links like "Read more", "Add new comment", etc. output
 *   from theme_links().
 * - $name: Themed username of node author output from theme_user().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from theme_links().
 * - $submitted: themed submission information output from
 *   theme_node_submitted().
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $teaser: Flag for the teaser state.
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 */
?>

<section id="node-<?= $node->nid; ?>" class="<?= (isset($classes) ? $classes : '') . $ep_classes ?>">

  <article class="article-full">
    <header class="article-full-header">
      <h1><?= $title; ?></h1>

      <? if (isset($drophead) && $drophead) : ?>
        <p class="preface">
          <?= strip_tags($drophead); ?>
        </p>
      <? endif; ?>

      <div class="metadata">
        <ul>
          <li><time datetime="<?= date('Y-m-d', $node->created); ?>"><?= strftime('%e de %B de %Y', $node->created); ?></time></li>
          <li><?= l('Ir a los comentarios', "node/$node->nid", array('fragment' => 'comments')); ?></li>
        </ul>
        <?= theme('social_share_links', "node/$node->nid", $share_title, $share_summary, $share_description, $share_image, $share_medium_top, $share_campaign); ?>
      </div>
    </header>

    <? if (isset($picture)): ?>
      <figure class="newsPic">
        <?= $picture; ?>
      </figure>
    <? endif; ?>

    <?= $node->body; ?>

    <? if (isset($disqus_comments)) : ?>
      <h2 id="comments"><?= t('Comments') ?></h2>
      <?= $disqus_comments; ?>
    <? endif; ?>

  </article>
</section>
