<?php $this->load->view('includes/cabecera_principal');
?>

<div id="cabecera_top">
<?php 
	
	echo form_open();
	echo anchor ('usuarios/editar', $login_usuario);
	echo anchor('login/logout', 'Desconectarse');
	echo anchor ('subida_video/nuevo_video','Subir película');
	echo form_close();
?>
</div>
<div id="texto_busqueda" align=right>
<?php 
	echo form_open('busqueda');
        echo form_input('palabra', set_value('palabra', 'Introduzca la búsqueda'));
       echo anchor ('busqueda/busqueda_paginada', 'Buscar'); 
    	echo form_close();  
?>

</div>

<div align=center>
<?php echo anchor('/principal/index',img('/imagenes/diablo_logo3.png')); ?>
</div>


<div id="div_error" align="center">
<p></h2> No se han encontrado resultados para su búsqueda </h2></p>
<p><?php echo img('imagenes/error64.png') ?></p>
</div>

     

<?php $this->load->view('includes/pie'); ?>
