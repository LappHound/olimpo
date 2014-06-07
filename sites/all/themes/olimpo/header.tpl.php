<div id="logotype">
	<?php echo l('','<front>'); ?>
</div>
<div id="right">
	<div id="title">
		<?php echo l('','<front>'); ?>
	</div>

	<ul class="menubar">
		<li>
			<?php echo l('Inicio','<front>'); ?>
		</li>
		<li>
			<?php echo l(t('News'),'noticias'); ?>
		</li>
		<li>
			<a class="expand" id="expandGym">Gimnasio</a>
			<ul id="submenuGym" class="hidden">
				<li><?php echo l('Instalaciones','gimnasio/instalaciones'); ?></li>
				<li><?php echo l(t('Location'),'gimnasio/localizacion'); ?></li>
				<li><?php echo l('Actividades','gimnasio/actividades'); ?></li>
			</ul>
		</li>
		<li>
			<?php echo l(t('Images'),'imagenes'); ?>
		</li>
		<li>
			<?php echo l(t('Videos'),'videos'); ?>
		</li>
		<li>
			<?php echo l('Contacto','contacto'); ?>
		</li>
	</ul>
</div>
