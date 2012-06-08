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

function crear_video($usuario)

 {
		

		$nuevo_video = array(
			'nombre' => $this->input->post('nombre'),
			'usuario' => $usuario,
			'categoria' => $this->input->post('categoria'),		
			'descripcion' => $this->input->post('descripcion'),	
								
		);
		
		$insert = $this->db->insert('videos', $nuevo_video);
		return $insert;
	}




}

?>
