<div class="the-gym">
    <header>
        <h1>Gimnasio</h1>
    </header>

    <div class="misc_gym_main">
        <div class="tabs-mobified--wrapper" data-block-identifier="1">
            <a href="#" class="btn--tab-switch btn--tab-switch_prev btn--tab-switch--disabled"><?= t('Prev'); ?></a>
            <ul class="tabs" id="tab__1" data-tab-identifier="<?= $active_tab_identifier; ?>">
                <? foreach($tabs as $tab_identifier => $tab) : ?>
                    <li>
                        <?= l($tab['title'], $tab['path'], array('attributes' => $tab['attributes'], 'fragment' => $tab['fragment'])); ?>
                    </li>
                <? endforeach; ?>
            </ul><!-- .tabs -->
            <a href="#" class="btn--tab-switch btn--tab-switch_next"><?= t('Next'); ?></a>
        </div><!-- .tabs-mobified-wrapper -->

        <div class="main-tab-content" data-block-identifier="1">
            <ul class="slide-content-wrapper" id="tab_content__1" data-tab-identifier="<?= $active_tab_identifier; ?>">
                <? foreach ($tab_contents as $tab_identifier => $content) : ?>
                    <li class="slide-content-wrapper__child<?= isset($content_class) ? " $content_class" : ''; ?>" id="tab_content__<?= "1_{$tab_identifier}"; ?>" data-tab-identifier="<?= $tab_identifier; ?>">
                        <?= $content; ?>
                    </li>
                <? endforeach; ?>
            </ul><!-- .TABBED_CONTENT -->
        </div><!-- .main -->
    </div>
</div>
