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
	     $data['tabla'] = $this->generar_tabla_ultimos();
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
		

# Cargamos la librería  y vamos configurando los diferentes parámetros de la tabla, apoyándonos siempre en los métodos de CI

	     $this->load->library('table');

	     $tmpl = array ( 'table_open'  => '<table class="transparente" style="width: 30%;" cellpadding="5" font-size="20px" cellspacing="10" align="center">', );

	     $this->table->set_heading('<h2>Videos más recientes</h2>', '<h2>Subido hace</h2>');

	     $this->table->set_template($tmpl); 

# Una vez configurada hacemos la select de la vista que creamos en nuestro archivo SQL.

	     $query = $this->db->query("SELECT nombre, fecha, enlace, video FROM ultimos_videos");
		
	    
# El resultado lo vamos a tratar, vamos a colocar un enlace en el nombre del video para poder acceder a él

	     foreach($query->result() as $dato):
	     $array[0] = anchor("reproducir_video/index/".$dato->video, $dato->nombre);
             $array[1] = $dato->fecha;   
	     $this->table->add_row($array);
             endforeach;

# Una vez tratado lo devolvemos

	     return  $this->table->generate();  
	 	
	}

# Crearemos la otra tabla para mostrar los videos más votados repetiremos el proceso del método anterio


	function generar_tabla_votados()
	
	{
	     

	     $this->load->library('table');

	     $tmpl = array ( 'table_open'  => '<table class="transparente" style="width: 30%;" cellpadding="5" font-size="20px" cellspacing="10" align="center">', );

	     $this->table->set_heading('<h2>Videos mejor valorados</h2>', '<h2>Valoracion</h2>');

	     $this->table->set_template($tmpl); 


# Una vez configurada hacemos la select de la vista que creamos en nuestro archivo SQL.

	     $query = $this->db->query("SELECT video, nombre, media, enlace FROM puntuacion_videos");
		
	    
# El resultado lo vamos a tratar, vamos a colocar un enlace en el nombre del video para poder acceder a él

	     foreach($query->result() as $dato):
	     $array[0] = anchor("reproducir_video/index/".$dato->video, $dato->nombre);
             $array[1] = $dato->media;   
	     $this->table->add_row($array);
             endforeach;

# Una vez tratado lo devolvemos

	     return  $this->table->generate();  
	 	
	}

	   


}
?>
