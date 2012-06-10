<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	 
	class busqueda extends CI_Controller {
	 
	 function __construct()
	 {
	   parent::__construct();

           $this->load->helper('url');
	   $this->load->model('video');
	   $this->load->library('pagination');
  
	 }
	 

# Función principal

	 function index()
	 {
       
       	 $session_data = $this->session->userdata('conectado');
	 $data['login_usuario'] = $session_data['login_usuario'];
	 $data['tabla'] = $this->busqueda();
     	 $this->load->view('busqueda', $data );
	 
	 }


# Búsqueda paginada

	function busqueda()
	{


# Vamos a configurar la búsqueda paginada, cargando librerías

		$this->load->library('pagination');
		$this->load->library('table');
		

# Definimos la base url,  filas totales, resultados por página y también los de la tabla
		
		$config['base_url'] = 'http://localhost/web/Proyecto-Integrado/index.php/busqueda/index';
		$config['total_rows'] = $this->db->get('videos')->num_rows();
		$config['per_page'] = 10;
		$config['full_tag_open'] = '<div id="paginacion">';
		$config['full_tag_close'] = '</div>';
		$tmpl = array ( 'table_open'  => '<table class="transparente" style="width: 30%;" cellpadding="5" cellspacing="10" font-size="20px" align="center">', );
                $this->table->set_heading('<h2>Nombre de video</h2>', '<h2>Autor</h2>', '<h2>Fecha de subida</h2>','<h2>Descripción</h2>' );
                $this->table->set_template($tmpl); 


# Cargamos los datos de la paginación	
	
		$this->pagination->initialize($config);
	
		
# Preparamos la consulta y la almacenamos 

		$query = $this->db->get('videos', $config['per_page'], $this->uri->segment(3));

# El resultado lo vamos a tratar, vamos a colocar un enlace en el nombre del video para poder acceder a él

	     foreach($query->result() as $dato):
	     $array[0] = anchor('usuario/form/'.$dato->nombre, $dato->nombre);
             $array[1] = $dato->usuario;   
	     $array[2] = $dato->fecha_subida;  
	     $array[3] = $dato->descripcion;    
	     $this->table->add_row($array);
             endforeach;

# Una vez tratado lo devolvemos

	     return  $this->table->generate();  
	}


}


?>
