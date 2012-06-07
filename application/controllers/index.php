<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	 
	class Index extends CI_Controller {
	 
	 function __construct()
	 {
	   parent::__construct();
	 }

# Función index, controlará si el ususario está conectado si es así mandará los datos de este a la vista
# de la página principal, en caso contrario, refrescará y mandará al login.

	 
	function index()
	 {
	   if($this->session->userdata('conectado'))
	   {
	      $session_data = $this->session->userdata('conectado');
	     $data['login_usuario'] = $session_data['login_usuario'];
	     $data['nombre'] = $session_data['nombre'];
	     $data['apellidos'] = $session_data['apellidos'];
	     $data['email'] = $session_data['email'];
	     
	     $this->load->view('principal', $data);
	   }
	   else
	   {
	     
	     redirect('login', 'refresh');
	   }
	 }
	 
	}	 
?>
