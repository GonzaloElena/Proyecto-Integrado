


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


<div id="superior" align="center">
<?php echo $tabla ?>
</div>
<div id="inferior" align="center">
<?php echo $this->pagination->create_links(); ?>
</div>
     
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>	
<script type="text/javascript" charset="utf-8">$('tr:odd').css('background', '#e3e3e3'); </script>
</body>
<?php $this->load->view('includes/pie'); ?>
