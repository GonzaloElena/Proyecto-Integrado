<?php $this->load->view('includes/cabecera_principal');
?>

<div id="cabecera_top">
<?php 
	
	echo form_open('login/editar_usuario');
	echo anchor ('login/editar', $login_usuario);
	echo anchor('principal/logout', 'Desconectarse');
	echo anchor ('subida_video/nuevo_video','Subir película');
	echo form_close();
?>
</div>
<div id="texto_busqueda" align=right>
<?php 
	echo form_open('busqueda');
        echo form_input('palabra', set_value('palabra', 'Introduzca la búsqueda'));
       echo form_submit ('Submit', 'Buscar'); 
    	echo form_close();  
?>


</div>
<div align=center>
<?php echo anchor('/principal/index',img('/imagenes/diablo_logo3.png')); ?>
</div>

<div align= center>
<table width=100% border="1" align="center" cellpadding="2" bgcolor="transparent" style="text-align: center" class="transparente"> 
<th>Busqueda positiva</th>	
</table>
</div>

<?php $this->load->view('includes/pie'); ?>
