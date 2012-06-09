<?php

Class Comentario extends CI_Model
{





# Función que nos va a devolver el computo total de votos acumulado por un video


function computo_votos($id)

{

$this -> db -> select('video, AVG(puntuacion)');
$this -> db -> from('comentarios');
$this -> db -> where('video',$id);

return $this -> db -> get();



select video, SUM(puntuacion)  from comentarios group by video;

	
}



}

?>
