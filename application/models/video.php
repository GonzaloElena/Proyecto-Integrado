<?php

Class Video extends CI_Model
{

function buscar_video($palabra)
{
	  
$this -> db -> select('id_video, nombre, , usuario, categoria, descripcion');
$this -> db -> from('videos');
$this -> db -> like('nombre',$palabra);

	 
$data= $this -> db -> get();
	 
if($data -> num_rows() > 0)
{
  return $data->result_array();
 }
  else
{
 return false;
   }
  }

function crear_video()

 {
		
		$nuevo_usuario = array(
			'nombre' => $this->input->post('nombre'),
			'apellidos' => $this->input->post('apellidos'),
			'email' => $this->input->post('email'),			
			'login_usuario' => $this->input->post('login_usuario'),
			'clave' => md5($this->input->post('clave'))						
		);
		
		$insert = $this->db->insert('usuarios', $nuevo_usuario);
		return $insert;
	}



}	

?>
