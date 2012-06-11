<?php

Class Comentario extends CI_Model
{





# Función que nos va a devolver el computo total de votos acumulado por un video


function computo_votos($id_video)

{

$this -> db -> select( 'ROUND(AVG(puntuacion))');
$this -> db -> from('comentarios');
$this -> db -> where('video',$id_video);

return $this -> db -> get();



	
}



}

?>
