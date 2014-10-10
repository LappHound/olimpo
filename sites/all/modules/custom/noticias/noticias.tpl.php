<section class="news">
    <header>
        <h1>Noticias</h1>
        <h2 class="preface">Todas las noticias que hemos publicado desde el Club Deportivo Olimpo, desde 2010.</h2>
    </header>
    <div class="content">
        <? foreach($noticias as $noticia) : ?>
            <article id="noticia-<?= $noticia['nid']; ?>" class="article-archived">
                <header>
                    <h2>
                        <?= l($noticia['title'], 'node/' . $noticia['nid']); ?>
                    </h2>
                </header>
                <ul class="metadata">
                    <li><?= format_date($noticia['created']); ?></li>
                </ul>
                <p><?= $noticia['drophead']; ?></p>
            </article>
        <? endforeach; ?>
    </div>
    <footer>
        <?= $pager; ?>
    </footer>
</section>
