<?php

Class Usuario extends CI_Model
{

# Función de login para extraer los datos del usuario en función al login y clave
# Si no obtiene ningún resultado para la select devolverá false


function login($login_usuario, $clave)
{
	  
$this -> db -> select('id_usuario, login_usuario, clave, nombre, apellidos, email');
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


# Función para crear un nuevo usuario

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


# Función para modificar un usuario

function modificar_usuario($login_usuario)
	{
		
		$usuario = array(
			'nombre' => $this->input->post('nombre'),
			'apellidos' => $this->input->post('apellidos'),
			'email' => $this->input->post('email'),			
			'clave' => md5($this->input->post('clave'))						
		);
		
		$this->db->where('login_usuario', $login_usuario);
		$update = $this->db->update('usuarios', $usuario);
		return $update;
	}



# Función para refrescar los datos del usuario que está logueado


function refrescar_datos($login_usuario)
{
	  
$this -> db -> select('id_usuario, login_usuario, clave, nombre, apellidos, email');
$this -> db -> from('usuarios');
$this -> db -> where('login_usuario = ' . "'" . $login_usuario . "'");
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


}
?>
