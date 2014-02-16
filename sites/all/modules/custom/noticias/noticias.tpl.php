<?php if(is_array($noticias)) {
foreach($noticias as $noticia) {
    if($noticia['filepath'])
        $picture = theme_image($noticia['filepath'],$noticia['title'],$noticia['title'],array('height' => '100px', 'width' => '160px'), FALSE);
    ?>
<div id="noticia-<?php print $noticia['nid']?>" class="noticias">
	<div class="cabeceraNoticia">
            <h2><?php print l($noticia['title'],'node/'.$noticia['nid']); ?></h2>
	</div>
    <div class="cuerpoNoticia">
        <?php if($noticia['filepath'])
            print '<div class="all-attached-images">'.$picture.'</div>';
        ?>
        <span class="fecha"><?php print format_date($noticia['created'])?></span>
        <p>
            <?php print $noticia['teaser']?>
        </p>
    </div>
</div>
<?php }
	print $pager;
}
else
	print '<p>Lo sentimos, por el momento no hay noticias</p>';?>