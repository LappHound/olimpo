<section class="track_record--athletes gg-row">
    <header>
        <h1><?= $athlete['name']; ?></h1>
        <h2 class="preface"><?= t('@years years old', array('@years' => track_record_get_ages($athlete['birthday']))); ?></h2>
    </header>
    <div class="gg-row">
        <div class="gg-49pc gg-column">
            <div class="profile">
                <?= theme('track_record_athlete_photo', $athlete); ?>
                <p></p>
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

    <div class="gg-row">
        <h3><?= t('Track record'); ?></h3>
        <ul>
            <? foreach ($athlete['records'] as $record) : ?>
                <li><?= theme('track_record_single_record', $medals[$record['medal']], $record['title']); ?></li>
            <? endforeach; ?>
        </ul>
    </div>

</section>
