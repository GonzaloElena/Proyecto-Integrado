<?php $this->load->view('includes/cabecera_login_registro'); ?>

<div id="formulario_registro">

<h1>Alta de usuario</h1>
<fieldset>
<legend>Información Personal</legend>
<?php
   
echo form_open('login/nuevo_usuario');

echo form_input('nombre', set_value('nombre', 'Nombre'));
echo form_input('apellidos', set_value('apellidos', 'Apellidos'));
echo form_input('email', set_value('email', 'Correo electrónico'));
?>
</fieldset>

<fieldset>
<legend>Datos de Usuario</legend>
<?php
echo form_input('login_usuario', set_value('login_usuario', 'Usuario'));
echo form_input('clave', set_value('clave', 'Contraseña'));
echo form_input('clave2', 'Confirmar contraseña');

echo form_submit('submit', 'Crear usuario');
?>

<?php echo validation_errors('<p class="error">'); ?>
</fieldset>
</div>

<?php $this->load->view('includes/pie'); ?>
