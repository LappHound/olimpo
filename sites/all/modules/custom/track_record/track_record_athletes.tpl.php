<section class="track_record--athletes gg-row">
    <header>
        <h1><?= t('@club athletes', array('@club' => $club['name'])); ?></h1>
        <h2 class="preface"><?= t('From @date', array('@date' => strftime('%B %Y', $club['establishment_date']))); ?></h2>
    </header>

    <div class="athletes">
        <? foreach ($athletes as $athlete) : ?>
            <article class="athlete gg-49pc gg-column">
                <header>
                    <span class="name"><?= $athlete['name']; ?></span>
                </header>

                <div class="profile">
                    <?= theme('track_record_athlete_photo', $athlete); ?>
                    <p><?= t('@years years old', array('@years' => track_record_get_ages($athlete['birthday']))); ?></p>
                </div>
                <ul class="track_records--records">
                    <? foreach ($medals as $medal_id => $medal_name) : ?>
                        <li class="track_records--record">
                            <?= theme('track_record_single_record', $medal_name, format_plural($athlete['track_record_summary'][$medal_id], '1 medal', '@count medals')); ?>
                        </li>
                    <? endforeach; ?>
                </ul>
            </article>
        <? endforeach; ?>
    </div>

</section>
