<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	 
	class busqueda_total extends CI_Controller {
	 
	 function __construct()
	 {
	   parent::__construct();

           $this->load->helper('url');
	   $this->load->library('pagination');
	   $this->load->library('form_validation');
  
	 }

# Función principal


	 function index()
	 {
	  	
		$data['login_usuario']= $this->cargar_datos_usuario();
	 	$data['tabla'] = $this->busqueda_clases();
		$this->load->view('busqueda', $data);	
	}

	    

	
# Búsqueda paginada con parámetros de texto

	function busqueda_clases()
	{


# Vamos a configurar la búsqueda paginada, cargando librerías 

		$this->load->library('pagination');
		$this->load->library('table');
		$categoria = $this->input->post('categoria');
		

		
# Definimos la base url,  filas totales, resultados por página y también los de la tabla
		
		$config['base_url'] = 'http://localhost/web/Proyecto-Integrado/index.php/busqueda_total/index';
		$config['total_rows'] = $this->db->get('videos')->num_rows();
		$config['per_page'] = 10;
		$config['full_tag_open'] = '<div id="paginacion">';
		$config['full_tag_close'] = '</div>';
		$tmpl = array ( 'table_open'  => '<table class="transparente" style="width: 30%;" cellpadding="5" cellspacing="10" font-size="20px" align="center">', );
                $this->table->set_heading('<h2>Nombre de video</h2>', '<h2>Autor</h2>', '<h2>Categoría</h2>', '<h2>Fecha de subida</h2>','<h2>Descripción</h2>' );
                $this->table->set_template($tmpl); 
		

# Cargamos los datos de la paginación	
	
		$this->pagination->initialize($config);
	
		

		
# Preparamos la consulta y la almacenamos 

		$this->load->model('video');
		$palabra = ' ';
		$query = $this->video->busqueda_palabra($config['per_page'], $this->uri->segment(3), $palabra );


		
		
		$query = $this->db->get('videos');
		foreach($query->result() as $dato):     
		$array[0] = anchor("reproducir_video/index/".$dato->id_video, $dato->nombre);
	        $array[1] = $dato->usuario;  
		$array[2] = $dato->categoria;  
		$array[3] = $dato->fecha_subida;  
	        $array[4] = $dato->descripcion;  
		$this->table->add_row($array);
		endforeach;
             

		

# El resultado lo vamos a tratar, vamos a colocar un enlace en el nombre del video para poder acceder a él

	     
# Una vez tratado lo devolvemos

	  
	     return  $this->table->generate();  
	}


# Cargamos los datos de sesión del usuario

 function cargar_datos_usuario() {
	
  	 $session_data = $this->session->userdata('conectado');
	 return $session_data['login_usuario'];


 }


}

?>
