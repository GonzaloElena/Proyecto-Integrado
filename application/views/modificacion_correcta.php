<?php $this->load->view('includes/cabecera_login_registro'); ?>

<div id="registro_correcto">

<h3>Felicidades, tu usuario ha sido modificado correctamente</h3>
<p>

<?php 

# Por medio de un botón el usuario regresa a la página principal

	echo form_open();
	echo anchor('index', 'Volver a página principal');
	echo form_close();
?>
</div>
</p>
<?php $this->load->view('includes/pie'); ?>
