<section class="track_record--athletes">
    <header>
        <h1><?= t('@club athletes', array('@club' => $club['name'])); ?></h1>
        <h2 class="preface"><?= t('From @date', array('@date' => date('F Y', $club['establishment_date']))); ?></h2>
    </header>

    <div class="athletes">
        <? foreach ($athletes as $athlete) : ?>
            <article class="athlete">
                <header>
                    <span class="name"><?= $athlete['name']; ?></span>
                </header>

                <div class="profile">
                    <?= theme('track_record_athlete_photo', $athlete); ?>
                    <p><?= t('@years years old', array('@years' => track_record_get_ages($athlete['birthday']))); ?></p>
                </div>
                <ul class="track_records--records">
                    <? foreach ($athlete['records'] as $record) : ?>
                        <li class="track_records--record"><?= theme('track_record_single_record', $record); ?></li>
                    <? endforeach; ?>
                </ul>
            </article>
        <? endforeach; ?>
    </div>

</section>
