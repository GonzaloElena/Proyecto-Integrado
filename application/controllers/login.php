<?php if ( ! defined('BASEPATH')) exit('No   script access allowed');
	 
	class Login extends CI_Controller {

# Construimos y cargamos el modelo de usuario
	 
	 function __construct()
	 {
	   parent::__construct();
	   $this->load->model('usuario','',TRUE);
	 }
	
# Cargamos el Helper con form y url y la vista de la pantalla de Login
 
	 function index()
	 {
	   $this->load->helper(array('form', 'url'));
	   $this->load->view('pantalla_login');
	 }

# Función para comprobar el login

 function comprobar_login()
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
	    
	     redirect('index', 'refresh');
	   }
	 
	 }

# Función que comprobará en la base de datos

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

# Función para cargar la vista de formulario de registro

	function registrarse()
	{
		$data['contenido'] = 'formulario_registro';
		$this->load->view('includes/template', $data);
	}

# Función para desconectar al usuario

 function logout()
	 {
	   $this->session->unset_userdata('conectado');
	   session_destroy();
	   redirect('index', 'refresh');
	 }
		 
}	 
?>
