<section class="track_record--club">
    <header>
        <h2><?= $club['name']; ?></h2>
        <?= theme('track_record_club_photo', $club); ?>
    </header>

    <? if (trim($club['description']) !== '') : ?>
        <div class="description">
            <?= $club['description']; ?>
        </div>
    <? endif; ?>

    <div class="track_records">
        <ul class="track_records--records">
            <? foreach ($medals as $medal_id => $medal_name) : ?>
                <li class="track_records--record">
                    <?= theme('track_record_single_record', $medal_name, format_plural($club['track_record_summary'][$medal_id], '1 medal', '@count medals')); ?>
                </li>
            <? endforeach; ?>
        </ul>
    </div>

    <? if (!empty($club['records'])) : ?>
        <div class="gg-row">
            <h2><?= t('Track record'); ?></h2>
            <ul>
                <? foreach ($club['records'] as $record) : ?>
                    <li><?= theme('track_record_single_record', $medals[$record['medal']], $record['title']); ?></li>
                <? endforeach; ?>
            </ul>
        </div>
    <? endif; ?>

</section>
