<?php $this->load->view('includes/cabecera_principal');
?>

<div id="cabecera_top">

<?php 
	
# Abrimos el form y vamos a habilitar 3 botones, uno para editar usuario al que le pasamos el login
# Otro para desconectar el ususario y un último para la subida de un video.

	echo form_open();
	echo anchor ("usuarios/editar/$login_usuario", $login_usuario);
	echo anchor('login/logout', 'Desconectarse');
	echo anchor ('subida_video/nuevo_video', 'Subir película');
	echo form_close();
?>
</div>

<div id="texto_busqueda" align=right>
<?php 

# Creamos un textbox para que el usuario pueda introducir una cadena y buscarla en la base de datos

	echo form_open('busqueda');
        echo form_input('palabra', set_value('palabra', 'Introduzca la búsqueda'));
        echo form_submit ('Submit', 'Buscar'); 
    	echo form_close(); 
?>


</div>
<div align=center>

<?php echo anchor('/principal/index',img('/imagenes/diablo_logo3.png')); ?>
</div>

<div>
<table width=40% border="1" align="left" cellpadding="2" bgcolor="transparent" style="text-align: center" class="transparente"> 
<th>Últimos videos</th>	
</table>
</div>
<div>
<table width=40% border="1" align="center" cellpadding="2" bgcolor="transparent" style="text-align: center" class="transparente"> 
<th>Videos más votados</th>	
</table>
</div>
<?php $this->load->view('includes/pie'); ?>
