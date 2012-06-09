<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	 
	class Index extends CI_Controller {
	 
	 function __construct()
	 {
	   parent::__construct();
	 }

# Función index, controlará si el ususario está conectado si es así mandará los datos de este a la vista
# de la página principal, en caso contrario, refrescará y mandará al login.
# Le vamos a mandar también los datos de las dos tablas que se muestran en la pantalla de inicio.

	 
	function index()
	 {
	   if($this->session->userdata('conectado'))
	   {

           		 
	     $session_data = $this->session->userdata('conectado');
	     $data['login_usuario'] = $session_data['login_usuario'];
	     $data['nombre'] = $session_data['nombre'];
	     $data['apellidos'] = $session_data['apellidos'];
	     $data['email'] = $session_data['email'];
	     
	     $data['tabla2'] = $this->generar_tabla_votados();
	     
		
	     
	     
	     $this->load->view('principal', $data );
	   }
	   else
	   {
	     
	     redirect('login', 'refresh');
	   }
	 }


# Vamos a crear una tabla usando la libería table nativa de CI, y ejecutando una select sencilla desde la vista que creamos en la DB

	function generar_tabla_ultimos()
	
	{
	 	
	}

# Crearemos la otra tabla para mostrar los videos más votados 


	function generar_tabla_votados()
	
	{
	 	
	     $this->load->library('table');

	     $tmpl = array ( 'table_open'  => '<table class="transparente" style="width: 100%;" cellpadding="5" cellspacing="10" >', );

	     $this->table->set_template($tmpl); 

	     $this->table->set_heading('<strong>Video mejor valorados</strong>', '<strong>Valoracion</strong>');

	     $query = $this->db->query("SELECT nombre, media FROM puntuacion_videos");

	     $tabla = $this->table->generate($query); 
	  	
 	     return $tabla;	

	}


}
?>
