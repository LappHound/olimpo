<section class="downloads">

    <header>
        <h1><?= t('Downloads'); ?></h1>
        <h2 class="preface"><?= t('All the document you need about @site', array('@site' => $site)); ?></h2>
    </header>

    <div class="content">
        <? if (!empty($downloads)) : ?>
            <? foreach ($downloads as $download) : ?>
                <?= theme('download', $download); ?>
            <? endforeach; ?>
        <? else : ?>
            <div class="empty-state">
                <i>Empty</i>
                <p>No hay archivos todavía.</p>
            </div>
        <? endif; ?>
    </div>

    <footer>
        <?= $pager; ?>
    </footer>

</section>
