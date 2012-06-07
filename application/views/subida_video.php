<?php $this->load->view('includes/cabecera_login_registro'); ?>

<div id="formulario_registro">

<h1>Alta de película</h1>
<fieldset>
<legend>Datos</legend>
<?php
   
echo form_open('subida_video/nuevo_video');

# Voy a crear un array de categorías para cargar el Combobox que usaré en el formulario.

$categorias = array(
                        'select' => 'Seleccione una categoria',
                        'Barbarian' => 'Bárbaro',
                        'Wizard' => 'Mago',
                        'Monk' => 'Monje',
                        'DemonHunter' => 'Demon Hunter'
			'WitchDoctor' => 'Witch Doctor'
             	 					);

# defino las propiedades del Text Area de descripcion       

$textarea = Array ("name" => "descripcion", "cols" => "10");


# Una vez creados mostramos los diferentes campos de entrada para la creación del nuevo video.


echo form_input('nombre', set_value('nombre', 'Nombre del video'));
echo form_dropdown('categoria', $categorias);
echo form_label ('Descripción');
echo Form_textarea($textarea);

echo form_submit('submit', 'Crear usuario');
?>
<?php echo validation_errors('<p class="error">'); ?>
</fieldset>
</div>

<?php $this->load->view('includes/pie'); ?>
