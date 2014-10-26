<article class="download">

    <header>
        <h2><?= $download['title']; ?></h2>
    </header>

    <p><?= $download['description']; ?></p>

    <?= l($download['title'], $download['filepath'], array('attributes' => array('class' => 'download', 'target' => '_blank'))); ?>
</article>
