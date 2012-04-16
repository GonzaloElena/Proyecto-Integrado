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
}
?>
