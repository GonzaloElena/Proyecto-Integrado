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

$this->db->limit($limit, $start, $palabra);
$query = $this->db-> get("$palabra");

 if ($query->num_rows() > 0) {
	            foreach ($query->result() as $row) {
	                $data[] = $row;
	            }
	            return $data;
	        }
	        return false;

	   }

# Búsqueda paginada

public function busqueda_total($limit, $start) {

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

# Búsqueda paginada con parámetros de texto


public function busqueda_palabra($limit, $start, $palabra) {

$this->db->limit($limit, $start);
$query = $this->db->query("select id_video as video, nombre, (select nombre from usuarios where usuario=id_usuario) as usuario, date (fecha_subida) as fecha, descripcion
from videos where nombre like '%$palabra%' order by id_video desc;");

return $query;

}



public function comprobar_palabra($palabra) {


$query = $this->db->query("select nombre, (select nombre from usuarios where usuario=id_usuario) as usuario, date (fecha_subida) as fecha, descripcion
from videos where nombre like '%$palabra%' order by id_video desc;");

$num = $query->num_rows();

return $num;

}

# Búsqueda del enlace a partir del nombre del video

public function extraer_enlace($video) {

$query = $this->db->query("select * from videos where id_video = '$video';");

return $query;

}

}

?>
