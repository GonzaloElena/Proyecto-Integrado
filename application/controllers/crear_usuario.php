<?php

class Crear_usuario extends Controller {
	

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
			$this->load->model('membership_model');
			
			if($query = $this->membership_model->create_member())
			{
				$data['main_content'] = 'signup_successful';
				$this->load->view('includes/template', $data);
				$this->enviar_mail('activate', $data['email'], $data);
			}
			else
			{
				$this->load->view('formulario_registro');			
			}
		}
		
	}



}

 ?>
