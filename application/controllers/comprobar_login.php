<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	 
	class comprobar_login extends CI_Controller {
	 
	 function __construct()
	 {
	   parent::__construct();
	   $this->load->model('usuario','',TRUE);
	 }
	 
	 function index()
	 {
	  
	   $this->load->library('form_validation');
	 
	   $this->form_validation->set_rules('login_usuario', 'login_usuario', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('clave', 'clave', 'trim|required|xss_clean|callback_comprobar_bd');
	 
	   if($this->form_validation->run() == FALSE)
	   {
	     
	     $this->load->view('pantalla_login');
	   }
	   else
	   {
	    
	     redirect('principal', 'refresh');
	   }
	 
	 }

	 function comprobar_bd($clave)
	 {
	   
	   $login_usuario = $this->input->post('login_usuario');
	 
	   
	   $result = $this->usuario->login($login_usuario, $clave);
	 
	   if($result)
	   {
	     $sess_array = array();
	     foreach($result as $row)
	     {
	       $sess_array = array(
	         'id_usuario' => $row->id_usuario,
	         'login_usuario' => $row->login_usuario,
		 'nombre' => $row->nombre,
		 'apellidos' => $row->apellidos,
	    	 'email' => $row->email
	       );
	       $this->session->set_userdata('conectado', $sess_array);
	     }
	     return TRUE;
	   }
	   else
	   {
	     $this->form_validation->set_message('comprobar_bd', 'Usuario o contraseña incorrectos');
	     return false;
	   }
	 }
	}
	?>
