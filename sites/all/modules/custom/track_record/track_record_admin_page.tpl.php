<div>
    <div class="main">
        <h3><?= t('Club administration'); ?></h3>
        <ul>
            <li><?= l(t('Edit club information'), 'admin/track_record/club'); ?></li>
            <li><?= l(t('Add and edit club track record information'), 'admin/track_record/club/records'); ?></li>
        </ul>
        <h3><?= t('Athletes administration'); ?></h3>
        <ul>
            <li><?= l(t('Add new athlete'), 'admin/track_record/athletes'); ?></li>
            <li><?= l(t('Edit athlete track record information'), 'admin/track_record/athletes'); ?></li>
        </ul>
    </div>
</div>
