<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	session_start(); 
	class Principal extends CI_Controller {
	 
	 function __construct()
	 {
	   parent::__construct();
	 }
	 
	 function index()
	 {
	   if($this->session->userdata('conectado'))
	   {
	     $session_data = $this->session->userdata('conectado');
	     $data['login_usuario'] = $session_data['login_usuario'];
	     $this->load->view('principal', $data);
	   }
	   else
	   {
	     
	     redirect('login', 'refresh');
	   }
	 }
	 
	 function logout()
	 {
	   $this->session->unset_userdata('conectado');
	   session_destroy();
	   redirect('principal', 'refresh');
	 }
	 
	}
	 
?>
