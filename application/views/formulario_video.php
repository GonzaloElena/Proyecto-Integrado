<?php $this->load->view('includes/cabecera_videos_registro'); ?>

<div id="formulario_video">

<h1>Alta de película</h1>
<fieldset>
<legend>Datos</legend>
<?php
   
echo form_open('subida_video/crear_video');

# Voy a crear un array de categorías para cargar el Combobox que usaré en el formulario.

$categorias = array(
                        'select' => 'Seleccione una categoria',
                        'Barbarian' => 'Bárbaro',
                        'Wizard' => 'Mago',
                        'Monk' => 'Monje',
                        'DemonHunter' => 'Demon Hunter',
			'WitchDoctor' => 'Witch Doctor'
             	 					);

# defino las propiedades del Text Area de descripcion       

$textarea = Array ("name" => "descripcion", "cols" => "30");


# Una vez creados mostramos los diferentes campos de entrada para la creación del nuevo video.


echo form_input('nombre', set_value('nombre', 'Nombre del video'));
echo form_dropdown('categoria', $categorias); ?>

<p>
<?php echo form_label ('Descripción'); ?>
</p>
<p>
<?php echo Form_textarea($textarea); ?>
</p>
<?php echo form_submit('submit', 'Crear usuario');
?>


<?php echo validation_errors('<p class="error">'); ?>
</fieldset>
</div>

<?php $this->load->view('includes/pie'); ?>
