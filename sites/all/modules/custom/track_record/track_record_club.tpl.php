<section class="track_record--club">
    <header>
        <?= theme('image', $club_image, $club['name'], $club['name']); ?>
        <h1><?= $club['name']; ?></h1>
        <h2 class="preface"><?= t('From @date', array('@date' => strftime('%B %Y', $club['establishment_date']))); ?></h2>
    </header>

    <div class="track_records">
        <ul class="track_records--records">
            <? foreach ($records as $record) : ?>
                <li class="track_records--record"><?= theme('track_record_single_record', $record); ?></li>
            <? endforeach; ?>
        </ul>
    </div>

</section>
