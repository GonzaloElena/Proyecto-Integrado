<?php $this->load->view('includes/cabecera_principal');
?>

<div id="cabecera_top">
<?php 
	
	echo form_open();
	echo anchor ("usuarios/editar/$login_usuario", $login_usuario);
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


<div id="div_container">


<table width="1em" border="0" cellpadding="0" bgcolor="transparent" text-align="center" class="transparente"> 
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



<div id="div_error" align="center">
<p></h2> No se han encontrado resultados para su búsqueda </h2></p>
<p><?php echo img('imagenes/error64.png') ?></p>
</div>

    

 

<?php $this->load->view('includes/pie'); ?>
