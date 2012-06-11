<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	 
	class reproducir_video extends CI_Controller {
	 
	 function __construct()
	 {
	   parent::__construct();
           $this->load->helper('url');
 	   $this->load->model('video');
	 }
	 

# Este controlador se encargará de cargar la vista encargada de las reproducciones


	 function index($video)
	 {
	
	  
	  
         $query = $this->db->query("SELECT * FROM videos where id_video = $video");

	foreach ($query->result() as $row)
	{
	  $data['id_video'] = $row->id_video;
	  $data['nombre'] = $row->nombre;
	  $data['enlace'] = $row->enlace;
	  $data['usuario'] = $row->usuario;
	  $data['categoria'] = $row->categoria;
	  $data['descripcion'] = $row->enlace;
	  $data['fecha_subida'] = $row->enlace;

	    
	}

	 $data['login_usuario'] = $this->cargar_datos_usuario();
	 $this->load->view('stream', $data);


	}



# Cargamos los datos de sesión del usuario

 function cargar_datos_usuario() {
	
  	 $session_data = $this->session->userdata('conectado');
	 return $session_data['login_usuario'];


 }


}

?>
