<section class="track_record--athletes">
    <header>
        <h2><?= t('Athletes'); ?></h2>
    </header>

    <div class="gg-row">
        <? foreach ($athletes as $athlete) : ?>
            <article class="track_record--athlete gg-49pc gg-column">
                <header>
                    <span class="name"><?= $athlete['name']; ?></span>
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

                <footer>
                    <?= l('+ info', "track_record/{$athlete['id']}"); ?>
                </footer>
            </article>
        <? endforeach; ?>
    </div>

</section>
