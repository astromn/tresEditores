

<?php 

 include ('conexion.php');


function insertarcontexto($id_encuesta,$titulo,$descripcion,$nom)
	{


      global $mysqli ;

 

  $query = "INSERT INTO tbl_contexto ( id_encuesta, titulocontexto, descripcion, imagen)
              VALUES ('$id_encuesta', '$titulo','$descripcion','$nom')";

    $resultado = $mysqli->query($query);

    return $resultado;
	
		
	}




function eliminarcontexto($id_contexto)
	{


      global $mysqli ;

 

   $query = "DELETE FROM tbl_contexto WHERE id_contexto = '$id_contexto'";
    $resultado = $mysqli->query($query);
    return $resultado;
	
		
	}




function  mostarrcontexto($id_encuesta)
	{


      global $mysqli ;

  
$query = "SELECT * from tbl_contexto  where id_encuesta ='$id_encuesta' ";

$resultado = $mysqli->query($query);
    return $resultado;
	
		
	}







 ?>