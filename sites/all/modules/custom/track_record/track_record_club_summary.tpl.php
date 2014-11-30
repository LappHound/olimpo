<section class="track_record--club">
    <header>
        <h2><?= $club['name']; ?></h2>
        <?= theme('track_record_club_photo', $club); ?>
    </header>

    <div class="track_records">
        <ul class="track_records--records">
            <? foreach ($medals as $medal_id => $medal_name) : ?>
                <li class="track_records--record">
                    <?= theme('track_record_single_record', $medal_name, format_plural($club['track_record_summary'][$medal_id], '1 medal', '@count medals')); ?>
                </li>
            <? endforeach; ?>
        </ul>
    </div>

    <footer>
        <?= l('+ info', 'track_record/club'); ?>
    </footer>

</section>
