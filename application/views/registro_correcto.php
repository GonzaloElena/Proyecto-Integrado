<?php $this->load->view('includes/cabecera_login_registro'); ?>

<div id="registro_correcto">
<h3>Felicidades, tu usuario ha sido creado correctamente</h3>
<p>Aún no has logueado:
<?php 

# El usuario podrá loguear e identificarse una vez creado el usuario

	echo form_open('comprobar_login');
	echo anchor('login/index', 'Identificarse');
	echo form_close();
?>
</div>
</p>
<?php $this->load->view('includes/pie'); ?>
