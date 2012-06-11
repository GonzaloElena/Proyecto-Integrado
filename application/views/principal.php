<?php $this->load->view('includes/cabecera_principal');
?>

<script src="http://www.google.com/jsapi" type="text/javascript"></script>


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
        echo form_submit ('submit', 'Buscar'); 
    	echo form_close();  

?>
</div >
<div class="cabecera_logo" align="center">

<?php

# El logo será una imagen que redirecciona la página principal

 echo anchor('/principal/index',img('/imagenes/diablo_logo3.png')); 



# A continuación construiremos la sección de las categorías con los contenedores que hemos definido en nuestra hoja de estilos, para dotarla de mayor vistosidad
?>
</div>


<div id="div_container">


<table width="45%" border="0" cellpadding="0" bgcolor="transparent" text-align="center" class="transparente"> 
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
						<div id="inner"><?php echo form_open('busqueda_vistas/'); ?>
						<input type="hidden" name="categoria" id="categoria" value="videos_barbaros">
					 	<button type="submit" value="Submit">Bárbaro</button>
					    	<?php echo form_close();  ?>
   						</div>
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
<td><?php echo img('imagenes/Retrato_Barbaro.png') ?></td>
</tr>
<tr>
<td>
<div id="container">
	<div id="border1">
		<div id="ornaments">
			<div id="moreornaments">
				<div id="radialgradient">
					<div id="gloss">
						<?php echo form_open('busqueda_vistas/'); ?>
						<input type="hidden" name="categoria" id="categoria" value="videos_magos">
					 	<button type="submit" value="Submit">Mago</button>
					    	<?php echo form_close();  ?></div>
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
<td><?php echo img('imagenes/Retrato_Wizard.png') ?></td>
</tr>
<tr>
<td>
<div id="container">
	<div id="border1">
		<div id="ornaments">
			<div id="moreornaments">
				<div id="radialgradient">
					<div id="gloss">
						<div id="inner"><?php echo form_open('busqueda_vistas/'); ?>
						<input type="hidden" name="categoria" id="categoria" value="videos_monjes">
					 	<button type="submit" value="Submit">Monje</button>
					    	<?php echo form_close();  ?>      </div>
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
<td><?php echo img('imagenes/Retrato_Monje.png') ?></td>
</tr>
<tr>
<td>
<div id="container">
	<div id="border1">
		<div id="ornaments">
			<div id="moreornaments">
				<div id="radialgradient">
					<div id="gloss">
						<div id="inner"><?php echo form_open('busqueda_vistas/'); ?>
						<input type="hidden" name="categoria" id="categoria" value="videos_demonhunter">
					 	<button type="submit" value="Submit">Demon Hunter</button>
					    	<?php echo form_close();  ?></div>
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
<td><?php echo img('imagenes/Retrato_DemonHunter.png') ?></td>
</tr>
<tr>
<td>
<div id="container">
	<div id="border1">
		<div id="ornaments">
			<div id="moreornaments">
				<div id="radialgradient">
					<div id="gloss">
						<div id="inner"><?php echo form_open('busqueda_vistas/'); ?>
						<input type="hidden" name="categoria" id="categoria" value="videos_brujos">
					 	<button type="submit" value="Submit">Witch Doctor</button>
					    	<?php echo form_close();  ?></div>
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
<td><?php echo img('imagenes/Retrato_WitchDoctor.png') ?></td>
</tr>
<tr>
<td>
<div id="container">
	<div id="border1">
		<div id="ornaments">
			<div id="moreornaments">
				<div id="radialgradient">
					<div id="gloss">
						<div id="inner"><?php echo form_open('busqueda_total/'); ?>
						<input type="hidden" name="categoria" id="categoria" value="videos">
					 	<button type="submit" value="Submit">Todas</button>
					    	<?php echo form_close();  ?></div>
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
</tr>
</table>
</div>



<div id="div_superior" align= "center">
<?php 

# Muestro la tabla que el controlador me ha mandado



echo $tabla;

?>

</div>



<div id="div_inferior" align= "center">

<?php 

# Muestro la otra tabla


echo $tabla2;




# Cerramos div y vamos a crear una tabla con botones para cada categoría y una imagen de la clase

?>

</div>
<div>



</div>



<?php $this->load->view('includes/pie'); ?>




