<?php $this->load->view('includes/cabecera_login_registro'); ?>

<div id="formulario_login">

	<h1>Diablo III Movies</h1>

 <?php echo validation_errors(); ?>
	
	
<?php 

# Vista con el formulario de login para usuario, enviará por submit al controlador de login los datos introducidos

	echo form_open('login/comprobar_login');
	echo form_input('login_usuario', 'Usuario');
	echo form_password('clave', 'Clave');
	echo form_submit('submit', 'Identificarse');
	echo anchor('login/registrarse', 'Nuevo usuario');
	echo form_close();
	?>


</div>

	
<?php $this->load->view('includes/pie'); ?>

