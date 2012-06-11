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


<table width="40%" border="0" cellpadding="0" bgcolor="transparent" text-align="center" class="transparente"> 
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




<!-- Aquí colocaremos el reproductor de videos   -->

<div id="div_superior" align= "center" >

<object width="425" height="350">
<param name="movie" value="<?php echo $enlace ?> "> </param> <embed src="<?php echo $enlace ?> " type="application/x-shockwave-flash" width="425" height="350"> </embed> </object>


</div>

<!-- Aquí irán los comentarios e información del video   -->


<div id="div_info">


<table>

<!-- Aquí irán un contenedor ornamentado pra cada sección -->
<tr>
<td>
<div id="container">
	<div id="border1">
		<div id="ornaments">
			<div id="moreornaments">
				<div id="radialgradient">
					<div id="gloss">
						<div id="inner"><H4>Descripción:<?php echo $descripcion?></H4></div>
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
<td>
<div id="container">
	<div id="border1">
		<div id="ornaments">
			<div id="moreornaments">
				<div id="radialgradient">
					<div id="gloss">
						<div id="inner"><h4>Autor del video:<?php echo $login_usuario?></h4></div>
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
<td>
<div id="container">
	<div id="border1">
		<div id="ornaments">
			<div id="moreornaments">
				<div id="radialgradient">
					<div id="gloss">
						<div id="inner"><h4>Fecha de subida:<?php echo ($fecha_subida) ?></h4></div>
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
<tr>
<div id="container">
	<div id="border1">
		<div id="ornaments">
			<div id="moreornaments">
				<div id="radialgradient">
					<div id="gloss">
						<div id="inner"><h4><?php echo $nombre?></h4></div>
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
</tr>
<p>
<td></td>
</p>
</table>
</div>

<!-- Cuadro de texto para insertar comentarios -->


<!-- Div para hacer las votaciones -->

<div id="div_vota">
<h4> Puntúa y comenta el video </h4>
<div style="float:right">
1<input type="radio" name="puntuacion" value="1" <?=set_radio('puntuacion','1',true)?> />2 <input type="radio" name="puntuacion" value="2" <?=set_radio('puntuacion','2',true)?> />
3<input type="radio" name="puntuacion" value="3" <?=set_radio('puntuacion','3',true)?> />  4<input type="radio" name="puntuacion" value="4" <?=set_radio('puntuacion','4',true)?> />  
5<input type="radio" name="puntuacion" value="5" <?=set_radio('puntuacion','5',true)?> />  
</div>
<?= form_open('comentarios/enviar') ?>
<?= form_hidden('autor_video', $usuario); ?>
<?= form_hidden('id_usuario_logueado', $login_usuario); ?>
<?= form_textarea(array('name' =>'texto', 'rows'=>'10', 'cols'=>'80', 'value'=>'Escriba un comentario para el video'));?>   
<p><?= form_submit('enviar', 'Enviar', 'class="boton"') ?></p>
<?= form_close() ?>

</div>


<?php $this->load->view('includes/pie'); ?>




