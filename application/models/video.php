<?php

Class Video extends CI_Model
{


# Función que busca los videos en función a la palabra que le pasamos

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


# Función que busca todos los videos

function mostrar_videos()

{
	  
$this -> db -> select('*');
$this -> db -> from('videos');

 
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


# Función para calcular el total de videos

function total_videos()
		{
			 
			return $this->db->count_all('videos');
		}

# Función para crear videos 

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

# Búsqueda paginada

public function busqueda($limit, $start) {

$this->db->limit($limit, $start);
$query = $this->db-> get('videos');

 if ($query->num_rows() > 0) {
	            foreach ($query->result() as $row) {
	                $data[] = $row;
	            }
	            return $data;
	        }
	        return false;

	   }
}

?>
