<?php $this->load->view('includes/header'); ?>

<div id="login_form">

	<h1>Diablo III Movies</h1>
    <?php echo validation_errors(); ?>
	
	
<?php 
	echo form_open('comprobar_login');
	echo form_input('login_usuario', 'Usuario');
	echo form_password('clave', 'Clave');
	echo form_submit('submit', 'Identificarse');
	echo anchor('login/registrarse', 'Nuevo usuario');
	echo form_close();
	?>


</div>

	
<?php $this->load->view('includes/footer'); ?>

