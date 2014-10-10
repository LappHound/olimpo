<ul class="metadata">
    <li><?= l('', 'node/' . $item->nid, array('fragment' => 'comments', 'attributes' => array('class' => 'metadata-comments'))); ?></li>
    <li><time datetime="<?= date('Y-m-d', $item->created); ?>"><?= strftime('%e de %B de %Y', $item->created); ?></time></li>
</ul>
