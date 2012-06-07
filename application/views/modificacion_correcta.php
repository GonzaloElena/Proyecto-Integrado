<?php $this->load->view('includes/cabecera_login_registro'); ?>

<div id="registro_correcto">
<h3>Felicidades, tu usuario ha sido modificado correctamente</h3>
<p>
<?php 

	echo form_open('principal');
	echo anchor('principal/index', 'Volver a página principal');
	echo form_close();
?>
</div>
</p>
<?php $this->load->view('includes/pie'); ?>
