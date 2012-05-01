<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

  function __construct() {		
    CI_Controller::__construct();
    $this->load->model('Usuario');
  }

	
public function index()
{
		
 $this->load->view('usuarios/login');

}

function login() {
  	if ($this->input->post('login')) {
      $login_usuario = $this->input->post('login_usuario');
      $clave = $this->input->post('clave');
      $res = $this->Usuario->comprobar_usuario($login_usuario, $clave);
      if ($res->num_rows() == 1) {
        $datos = $res->row_array();
        $this->session->set_userdata('id_usuario', $datos['id_usuario']);
        $this->session->set_userdata('usuario', $login_usuario);
	redirect('principal/index');
      } else {
        $mensaje = 'Error: usuario o contraseña incorrectos';
	
      }
	

   }
	
	$this->load->view('usuarios/login',array( $mensaje));

  }
	
  function logout() {
    $this->session->sess_destroy();
    redirect('usuarios/login');
  }
 
}
