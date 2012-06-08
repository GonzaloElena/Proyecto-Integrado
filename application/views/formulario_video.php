<?php $this->load->view('includes/cabecera_videos_registro'); ?>

<div id="formulario_video">

<h1>Alta de película</h1>
<fieldset>
<legend>Datos</legend>

<?php echo form_open_multipart('subida_video/subir_video'); 

#Formulario para la subida de videos, usaremos el form_open_multipart y mandaremos los datos al controlador
# Habrá varios campos, nombre de video, un dropdown con las categorías, un cuadro de texto para la descripcion y una subida de archivo

?>

<?php echo form_input('nombre', set_value('nombre', 'Nombre'));?>

<p>
<?php echo form_label('Categoria:  ');

# Definimos un array con las categorías

$categorias = array(
                       
                        'Barbarian' => 'Bárbaro',
                        'Wizard' => 'Mago',
                        'WitchDoctor' => 'Witch Doctor',
                        'DemonHunter' => 'Demon Hunter',
			'Monk' => 'Monje'
                    );

echo form_dropdown('categoria', $categorias);
?>
</p>
<p>
<?php 

# Definimos un array con las características del Textarea

$data = array(
                       
                        'name' => 'descripcion',
                        'id' => 'descripcion',
                        'value' => 'Escriba aquí una breve descripción del video',
                        'cols' => '40',
			
                    );

echo form_textarea($data);

?>


</p>
<p>
<input type="file" id="video" name="video" >
</p>
<p>
<input type="submit" id="button" name="submit" value="Submit" />
</p>


<?php echo validation_errors('<p class="error">'); ?>
</fieldset>
</div>

<?php $this->load->view('includes/pie'); ?>
