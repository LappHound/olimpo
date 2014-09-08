<?php if(is_array($videos)) {
foreach($videos as $video) {
    if($video['filepath'])
        $picture = theme_image($video['filepath'], $video['title'], $video['title'], array('height' => '100', 'width' => '145'), FALSE);
    ?>
<div id="video-<?php print $video['nid']?>" class="videos">
<?php if($video['filepath'])
        print l('<div class="all-attached-images">'.$picture.'</div>','node/'.$video['nid'], array('html' => TRUE));;
?>
    <div class="cuerpoVideo">
		<div class="titleVideo">T&iacute;tulo: <span><?php print l($video['title'],'node/'.$video['nid']); ?></span></div>
		<div class="fechaVideo">
			<span>Fecha: <?php print date('d', $video['created'])?> <?php print date('M', $video['created'])?>&nbsp;<?php print date('Y', $video['created'])?></span>
		</div>
		<div class="duración">Duraci&oacute;n: <?php print $video['duracion'];?></div>
	</div>
</div>
<?php }
	print $pager;
}
else {
	print '<p>Lo sentimos, por el momento no hay videos publicados.</p>';
}
 ?>