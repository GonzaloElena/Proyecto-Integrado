<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subida_video extends CI_Controller {
	
 
	 function __construct()
	 {
	   parent::__construct();
	  
       	   

	 }


# Función para cargar el formulario de video

public function nuevo_video()
{

	
	 $session_data = $this->session->userdata('conectado');
	 $data['usuario'] = $session_data['id_usuario'];
	 $data['contenido'] = 'formulario_video';  
         $this->load->view('includes/template', $data);		
 
}


public function subir_video() {


# Definiremos las reglas de validación

      	  $this->load->library('form_validation');
	  $this->form_validation->set_rules('nombre', 'Nombre del video', 'trim|required|min_length[4]|max_length[50]|callback_notDefaultNombre');
	  $this->form_validation->set_rules('descripcion', 'Descripción', 'trim|required|callback_notDefaultDescripcion');
	  $this->form_validation->set_rules('categoria', 'Categoría', 'trim|required|callback_notDefaultCategoria');
	  
# Comprobaremos si se cumplen o no		
		
		
	 if($this->form_validation->run() == FALSE)

	 	{
		   $this->load->view('formulario_video');
		}

	else 
		
		{

# Si las reglas de validación están correctas, vamos a pasar a comprobar que la subida del video se hace correctamente

	 if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != ' ') 
	
		{

# Definimos los parámetros de configuración del video, ruta, tamaño máximo, formatos aceptados,...

		    unset($config);
		    $configVideo['upload_path'] = '/home/gonzalo/web/Proyecto-Integrado/videos';
		    $configVideo['max_size'] = '40240';
		    $configVideo['allowed_types'] = 'avi|flv|wmv|mp3';
		    $configVideo['overwrite'] = FALSE;
		    $configVideo['remove_spaces'] = TRUE;

# Aquí vamos a realizar una select en la base de datos, contaremos cuántos videos existen en la tabla VIDEOS
# Extraeremos ese resultado en una variable llamada $count, le sumaremos 1 y le pondremos ese resultado como nombre al archivo
# Esto lo hago porque a la hora de reproducir los videos los llamo por su ip, y así tengo vinculados los videos con el archivo

		    $count = $this->db->count_all_results('videos');
		    $video_name = $count + 1;
		    $configVideo['file_name'] = $video_name;

# Cargamos la libreria de Upload e inicializamos 
		    
		    $this->load->library('upload', $configVideo);
		    $this->upload->initialize($configVideo);

# comprobamos si se ha realizado correctamente la subida

		    if (!$this->upload->do_upload('video')) {

# Si hay un error avisamos al usuario
			
		        $data['contenido'] = 'subida_error';
			$this->load->view('includes/template', $data);

		    } else {


# En caso contrario actualizamos la base de datos


			$session_data = $this->session->userdata('conectado');
			$usuario = $session_data['id_usuario'];
			$this->load->model('video');
				
			if($query = $this->video->crear_video($usuario))
			{
				
			$videoDetails = $this->upload->data();
		        $data['contenido'] = 'subida_correcta';
			$this->load->view('includes/template', $data);
			        



			}
			else
			{
				 $data['contenido'] = 'subida_error';
				$this->load->view('includes/template', $data);			
			}


		      
		    }
		 }	

	}

   }

# Función para comprobar que el texto del Nombre no es el que se pone por defecto

function notDefaultNombre($str){
  if($str == 'Escriba aquí el nombre del video'){
     return FALSE;
  } else {
     return TRUE;
  }
}   

# Función para comprobar que el texto del Nombre no es el que se pone por defecto

function notDefaultDescripcion($str){
  if($str == 'Escriba aquí una breve descripción del video'){
     return FALSE;
  } else {
     return TRUE;
  }
}   

# Función para comprobar que el dropdown de la categoria no es el que se pone por defecto

function notDefaultCategoria($str){
  if($str == 'Default'){
     return FALSE;
  } else {
     return TRUE;
  }
}   


}



 ?>
