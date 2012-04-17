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
		
		$new_member_insert_data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email_address' => $this->input->post('email_address'),			
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))						
		);
		
		$insert = $this->db->insert('membership', $new_member_insert_data);
		return $insert;
	}
}



?>
