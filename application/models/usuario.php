<?php

Class Usuario extends CI_Model
{
function login($login_usuario, $clave)
{
	  
$this -> db -> select('id_usuario, login_usuario, clave');
$this -> db -> from('usuarios');
$this -> db -> where('login_usuario = ' . "'" . $login_usuario . "'");
$this -> db -> where('clave = ' . "'" . MD5($clave) . "'");
$this -> db -> limit(1);
	 
$query = $this -> db -> get();
	 
if($query -> num_rows() == 1)
{
  return $query->result();
 }
  else
{
 return false;
   }
  }


function crear_usuario()
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
