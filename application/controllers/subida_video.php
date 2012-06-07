<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subida_video extends CI_Controller {
	
 
	 function __construct()
	 {
	   parent::__construct();
	 
       	   

	 }
}

public function index()
{
		
 $this->load->view('subida_video/nuevo_video');

}


function nuevo_video()
	{

		$session_data = $this->session->userdata('conectado');
	        $data['usuario'] = $session_data['id_usuario'];
		$data['contenido'] = 'formulario_editar';  
		$this->load->view('includes/template', $data);
	}


function crear_video()
	{
		$this->load->library('form_validation');
		
		
		$this->form_validation->set_rules('nombre', 'Nombre del video', 'trim|required|min_length[4]|max_length[50]');
		$this->form_validation->set_rules('descripcion', 'Descripción', 'trim|required');
		
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('subida_video');
		}
		
		else
		{			
			$this->load->model('video');
			
			if($query = $this->video->crear_video())
			{
				$data['contenido'] = 'registro_correcto';
				$this->load->view('includes/template', $data);
			        



			}
			else
			{
				$this->load->view('subida_video');			
			}
		}




}

 ?>
