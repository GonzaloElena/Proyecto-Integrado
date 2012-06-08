<?php $this->load->view('includes/cabecera_videos_registro'); ?>

<div id="subida_error">
<h3>Debe escoger un video para subir</h3>
<?php


# Por medio de un botón el usuario regresa a la página principal

	echo form_open();
	echo anchor('subida_video/nuevo_video', 'Volver a formulario');
	echo form_close();

?>
</div>
</p>
<?php $this->load->view('includes/pie'); ?>
