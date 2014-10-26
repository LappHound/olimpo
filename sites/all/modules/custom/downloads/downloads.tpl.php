<section class="downloads">

    <header>
        <h1><?= t('Downloads'); ?></h1>
        <h2 class="preface"><?= t('All the document you need about @site', array('@site' => $site)); ?></h2>
    </header>

    <div class="content">
        <? foreach ($downloads as $download) : ?>
            <?= theme('download', $download); ?>
        <? endforeach; ?>
    </div>

    <footer>
        <?= $pager; ?>
    </footer>

</section>
