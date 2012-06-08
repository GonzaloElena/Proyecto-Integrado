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


public function add_video(){
        if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') {
            unset($config);
            $date = date("ymd");
            $configVideo['upload_path'] = '/home/gonzalo/web/Proyecto-Integrado/videos';
            $configVideo['max_size'] = '10240';
            $configVideo['allowed_types'] = 'avi|flv|wmv|mp3';
            $configVideo['overwrite'] = FALSE;
            $configVideo['remove_spaces'] = TRUE;

	    $count = $this->db->count_all_results('videos');

            $video_name = $count + 1;
            $configVideo['file_name'] = $video_name;
	    
            $this->load->library('upload', $configVideo);
            $this->upload->initialize($configVideo);
            if (!$this->upload->do_upload('video')) {
                echo $this->upload->display_errors();
            } else {
                $videoDetails = $this->upload->data();
                echo "Successfully Uploaded";
            }
        }
}

public function subir_video() {


# Definiremos las reglas de validación

      	  $this->load->library('form_validation');
	  $this->form_validation->set_rules('nombre', 'Nombre del video', 'trim|required|min_length[4]|max_length[50]');
	  $this->form_validation->set_rules('descripcion', 'Descripción', 'trim|required');

# Comprobaremos si se cumplen o no		
		
		
	 if($this->form_validation->run() == FALSE)

	 	{
		   $this->load->view('formulario_video');
		}

	else 
		
		{

# Si las reglas de validación están correctas, vamos a pasar a comprobar que la subida del video se hace correctamente

	 if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') 
	
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
		        echo $this->upload->display_errors();
		    } else {
		        $videoDetails = $this->upload->data();
		        echo "Successfully Uploaded";
		    }
		 }	

	}

   }

}

 ?>
