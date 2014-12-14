<article class="download">

    <header>
        <h2><?= $download['title']; ?> <?= l('', $download['filepath'], array('attributes' => array('class' => 'download', 'target' => '_blank'))); ?></h2>
    </header>

    <p><?= $download['description']; ?></p>

</article>
