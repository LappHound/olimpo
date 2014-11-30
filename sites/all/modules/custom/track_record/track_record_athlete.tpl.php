<section class="track_record--athletes track_record--athletes-athlete gg-row">
    <header>
        <h1><?= $athlete['name']; ?></h1>
    </header>
    <div class="gg-row">
        <div class="gg-49pc gg-column">
            <div class="profile">
                <?= theme('track_record_athlete_photo', $athlete); ?>
                <p><?= t('@years years old', array('@years' => track_record_get_ages($athlete['birthday']))); ?></p>
            </div>
        </div>
        <div class="gg-49pc gg-column">
            <ul class="track_records--records">
                <? foreach ($medals as $medal_id => $medal_name) : ?>
                    <li class="track_records--record">
                        <?= theme('track_record_single_record', $medal_name, format_plural($athlete['track_record_summary'][$medal_id], '1 medal', '@count medals')); ?>
                    </li>
                <? endforeach; ?>
            </ul>
        </div>
    </div>

    <? if (!empty($athlete['records'])) : ?>
        <div class="gg-row">
            <h2><?= t('Track record'); ?></h2>
            <ul>
                <? foreach ($athlete['records'] as $record) : ?>
                    <li><?= theme('track_record_single_record', $medals[$record['medal']], $record['title']); ?></li>
                <? endforeach; ?>
            </ul>
        </div>
    <? endif; ?>

</section>
