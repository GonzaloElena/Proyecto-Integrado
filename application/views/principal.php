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

<div id="texto_busqueda" align="right">
<?php 

# Creamos un textbox para que el usuario pueda introducir una cadena y buscarla en la base de datos

	echo form_open('busqueda');
        echo form_input('palabra', set_value('palabra', 'Introduzca la búsqueda'));
        echo form_submit ('Submit', 'Buscar'); 
    	echo form_close(); 
?>


</div>
<div class="cabecera_logo" align="center">

<?php

# El logo será una imagen que redirecciona la página principal

 echo anchor('/principal/index',img('/imagenes/diablo_logo3.png')); 

?>
</div>



<div style="float:left;">

<?php 

# Muestro la tabla que el controlador me ha mandado


	     $this->load->library('table');

	     $tmpl = array ( 'table_open'  => '<table class="transparente" style="width: 100%;" cellpadding="5" cellspacing="10" >', );


	     $this->table->set_heading('<strong>Videos más recientes</strong>', '<strong>Subido hace</strong>');

	     $this->table->set_template($tmpl); 

	     $query = $this->db->query("SELECT nombre, fecha FROM ultimos_videos");
		
	    


foreach($query->result() as $dato):
    $array[0] = anchor('usuario/form/'.$dato->nombre, $dato->nombre);
    $array[1] = $dato->fecha;   
    $this->table->add_row($array);
endforeach;

echo $this->table->generate();  

?>

</div>

<div style="float:left;">

<?php 

# Muestro la otra tabla


echo $tabla2;




# Cerramos div y vamos a crear una tabla con botones para cada categoría y una imagen de la clase

?>

</div>



<div id="div_container">

<div style="float:left;">
<table width=40% border="0" cellpadding="0" bgcolor="transparent" text-align="center" class="transparente"> 
<tr>
<th>
<h2>Categorías</h2>
</th>
</tr>
<tr>
<td>
<div id="container">
	<div id="border1">
		<div id="ornaments">
			<div id="moreornaments">
				<div id="radialgradient">
					<div id="gloss">
						<div id="inner">Bárbaro   </div>
						<div id="gradientbottom"></div>
					</div>
				</div>
				<div class="triangle top left bg"></div>
				<div class="triangle middle left bg"></div>
				<div class="triangle middle left"></div>
				<div class="triangle top left"></div>
				<div class="triangle bottom left bg"></div>
				<div class="triangle bottom left"></div>
				<div class="triangle top right bg"></div>
				<div class="triangle top right"></div>
				<div class="triangle middle right bg"></div>
				<div class="triangle middle right"></div>
				<div class="triangle bottom right bg"></div>
				<div class="triangle bottom right"></div>
			</div>
		</div>
	</div>
</div>
</td>
<td><?php echo anchor('/principal/index',img('/imagenes/Retrato_Barbaro.png')); ?></td>
</tr>
<tr>
<td>
<div id="container">
	<div id="border1">
		<div id="ornaments">
			<div id="moreornaments">
				<div id="radialgradient">
					<div id="gloss">
						<div id="inner">Mágo        </div>
						<div id="gradientbottom"></div>
					</div>
				</div>
				<div class="triangle top left bg"></div>
				<div class="triangle middle left bg"></div>
				<div class="triangle middle left"></div>
				<div class="triangle top left"></div>
				<div class="triangle bottom left bg"></div>
				<div class="triangle bottom left"></div>
				<div class="triangle top right bg"></div>
				<div class="triangle top right"></div>
				<div class="triangle middle right bg"></div>
				<div class="triangle middle right"></div>
				<div class="triangle bottom right bg"></div>
				<div class="triangle bottom right"></div>
			</div>
		</div>
	</div>
</div>
</td>
<td><?php echo anchor('/principal/index',img('/imagenes/Retrato_Wizard')); ?></td>
</tr>
<tr>
<td>
<div id="container">
	<div id="border1">
		<div id="ornaments">
			<div id="moreornaments">
				<div id="radialgradient">
					<div id="gloss">
						<div id="inner">Monje        </div>
						<div id="gradientbottom"></div>
					</div>
				</div>
				<div class="triangle top left bg"></div>
				<div class="triangle middle left bg"></div>
				<div class="triangle middle left"></div>
				<div class="triangle top left"></div>
				<div class="triangle bottom left bg"></div>
				<div class="triangle bottom left"></div>
				<div class="triangle top right bg"></div>
				<div class="triangle top right"></div>
				<div class="triangle middle right bg"></div>
				<div class="triangle middle right"></div>
				<div class="triangle bottom right bg"></div>
				<div class="triangle bottom right"></div>
			</div>
		</div>
	</div>
</div>
</td>
<td><?php echo anchor('/principal/index',img('/imagenes/Retrato_Monje')); ?></td>
</tr>
<tr>
<td>
<div id="container">
	<div id="border1">
		<div id="ornaments">
			<div id="moreornaments">
				<div id="radialgradient">
					<div id="gloss">
						<div id="inner">DemonHunter</div>
						<div id="gradientbottom"></div>
					</div>
				</div>
				<div class="triangle top left bg"></div>
				<div class="triangle middle left bg"></div>
				<div class="triangle middle left"></div>
				<div class="triangle top left"></div>
				<div class="triangle bottom left bg"></div>
				<div class="triangle bottom left"></div>
				<div class="triangle top right bg"></div>
				<div class="triangle top right"></div>
				<div class="triangle middle right bg"></div>
				<div class="triangle middle right"></div>
				<div class="triangle bottom right bg"></div>
				<div class="triangle bottom right"></div>
			</div>
		</div>
	</div>
</div>
</td>
<td><?php echo anchor('/principal/index',img('/imagenes/Retrato_DemonHunter.png')); ?></td>
</tr>
<tr>
<td>
<div id="container">
	<div id="border1">
		<div id="ornaments">
			<div id="moreornaments">
				<div id="radialgradient">
					<div id="gloss">
						<div id="inner">WitchDoctor</div>
						<div id="gradientbottom"></div>
					</div>
				</div>
				<div class="triangle top left bg"></div>
				<div class="triangle middle left bg"></div>
				<div class="triangle middle left"></div>
				<div class="triangle top left"></div>
				<div class="triangle bottom left bg"></div>
				<div class="triangle bottom left"></div>
				<div class="triangle top right bg"></div>
				<div class="triangle top right"></div>
				<div class="triangle middle right bg"></div>
				<div class="triangle middle right"></div>
				<div class="triangle bottom right bg"></div>
				<div class="triangle bottom right"></div>
			</div>
		</div>
	</div>
</div>
</td>
<td><?php echo anchor('/principal/index',img('/imagenes/Retrato_WitchDoctor.png')); ?></td>
</tr>
</table>
</div>




<?php $this->load->view('includes/pie'); ?>




