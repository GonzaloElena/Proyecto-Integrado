<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	 
	class busqueda extends CI_Controller {
	 
	 function __construct()
	 {
	   parent::__construct();
	   $this->load->model('video','',TRUE);
	 }
	 

# Función principal que buscará un video 

	 function index()
	 {
	 $this->load->model('video');

       
        $palabra = $this->input->post('palabra');
	
        
        $data = $this->video->buscar_video($palabra);

      	if ($data)
	{
	$session_data = $this->session->userdata('conectado');
	     $data['login_usuario'] = $session_data['login_usuario'];
	     $data['nombre'] = $session_data['nombre'];
	     $data['apellidos'] = $session_data['apellidos'];
	     $data['email'] = $session_data['email'];
        $this->load->view('busqueda',$data);
	}
	else
	{
	 $session_data = $this->session->userdata('conectado');
	     $data['login_usuario'] = $session_data['login_usuario'];
	     $data['nombre'] = $session_data['nombre'];
	     $data['apellidos'] = $session_data['apellidos'];
	     $data['email'] = $session_data['email'];
	 $this->load->view('error',$data);
	}
	
	 
	 }

	
	}
	?>
