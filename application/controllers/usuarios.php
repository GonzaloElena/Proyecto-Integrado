<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

  function __construct() {		
    CI_Controller::__construct();
    $this->load->model('usuario','',TRUE);
    
  }



# Función que cargará la vista de formulario de edición de usuario, le pasará los parámetros necesarios
# Actualizará los datos del usuario durante la sesión si los ha modificado

function editar($login_usuario )
	{	
	
	 
		$result = $this->usuario->refrescar_datos($login_usuario);
		 
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
		    }


		$session_data = $this->session->userdata('conectado');
	        $data['login_usuario'] = $session_data['login_usuario'];
	        $data['nombre'] = $session_data['nombre'];
	        $data['apellidos'] = $session_data['apellidos'];
	        $data['email'] = $session_data['email'];
		$data['contenido'] = 'formulario_editar';  
		$this->load->view('includes/template', $data);
	}


# Función para crear un nuevo usuario, validará los datos y si son correctos lo añadirá a la DB

	function nuevo_usuario()
	{
		$this->load->library('form_validation');
		
		
		$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
		$this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required');
		$this->form_validation->set_rules('email', 'Correo electrónico', 'trim|required|valid_email');
		$this->form_validation->set_rules('login_usuario', 'Usuario', 'trim|required|xss_clean');
		$this->form_validation->set_rules('clave', 'Contraseña', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('clave2', 'Confirmar contraseña', 'trim|required|matches[clave]');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('formulario_registro');
		}
		
		else
		{			
			$this->load->model('usuario');
			
			if($query = $this->usuario->crear_usuario())
			{
				$data['contenido'] = 'registro_correcto';
				$this->load->view('includes/template', $data);
			        



			}
			else
			{
				$this->load->view('formulario_registro');			
			}
		}

	
		
	}

# Función para modificar un usuario, validará los datos y si son correctos hará un update a la DB

	function editar_usuario()
	{
		$this->load->library('form_validation');
		
		
		$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
		$this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required');
		$this->form_validation->set_rules('email', 'Correo electrónico', 'trim|required|valid_email');
		$this->form_validation->set_rules('login_usuario', 'Usuario', 'trim|required|xss_clean');
		$this->form_validation->set_rules('clave', 'Contraseña', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('clave2', 'Confirmar contraseña', 'trim|required|matches[clave]');
		$session_data = $this->session->userdata('conectado');
		$data['login_usuario'] = $session_data['login_usuario'];
		$data['nombre'] = $session_data['nombre'];
		$data['apellidos'] = $session_data['apellidos'];
		$data['email'] = $session_data['email'];
		
		if($this->form_validation->run() == FALSE)
		{
			
			$this->load->view('formulario_editar', $data);
		}
		
		else
		{			
			$this->load->model('usuario');
			$session_data = $this->session->userdata('conectado');
			$login_usuario = $session_data['login_usuario'];
			if($query = $this->usuario->modificar_usuario($login_usuario))
			{
				$data['contenido'] = 'modificacion_correcta';
				$this->load->view('includes/template', $data);
			        



			}
			else
			{
				
				$this->load->view('formulario_editar', $data);			
			}
		}

	}


 
}

?>
