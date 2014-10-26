<article class="download">

    <header>
        <h2><?= l($download['title'], $download['filepath']); ?></h2>
    </header>

    <p><?= $download['description']; ?></p>

    <?= l($download['title'], $download['filepath'], array('attributes' => array('class' => 'download'))); ?>
</article>
