<?php $this->load->view('includes/cabecera_modificar_usuario');
?>

<div id="formulario_registro">

<h1>Modificación de usuario</h1>
<fieldset>
<legend>Información Personal</legend>
<?php
   
echo form_open('login/editar_usuario');

echo form_input('nombre', set_value('nombre', $nombre));
echo form_input('apellidos', set_value('apellidos', $apellidos));
echo form_input('email', set_value('email', $email));
?>
</fieldset>

<fieldset>
<legend>Datos de Usuario</legend>
<?php
$data = array(
'name' => 'login_usuario',
'id' => 'login_usuario',
'value' => $login_usuario,
'readonly'    => 'readonly'
 );
echo form_input($data);
echo form_password('clave', 'clave');
echo form_password('clave2', 'clave');

echo form_submit('submit', 'Modificar usuario');
?>

<?php echo validation_errors('<p class="error">'); ?>
</fieldset>
</div>

<?php $this->load->view('includes/pie'); ?>
