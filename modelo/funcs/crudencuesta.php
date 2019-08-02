
<?php 

  include ('conexion.php');


function insertarencuesta($id_usuario,$titulo,$descripcion,$fecha_inicio,$fecha_final)
	{


      global $mysqli ;

    $query = "INSERT INTO tbl_encuestas (id_usuario, titulo, descripcion, estado, fecha_inicio, fecha_final)
              VALUES ('$id_usuario', '$titulo', '$descripcion', '0', '$fecha_inicio', '$fecha_final')";

    $resultado = $mysqli->query($query);

    return $resultado;
	
		
	}


  function eliminarencuesta($id_encuesta)
  {

      global $mysqli ;

    $query = " DELETE FROM tbl_encuestas WHERE id_encuesta = '$id_encuesta'";
    $resultado = $mysqli->query($query);

    return $resultado;
  
    
  }


  function finalizarencuesta($id_encuesta)
  {

      global $mysqli ;

  
    $query = "UPDATE tbl_encuestas SET estado = '0' WHERE id_encuesta = '$id_encuesta'";
    $resultado = $mysqli->query($query);

    return $resultado;
  
    
  }


  function publicarencuesta($id_encuesta)
  {

      global $mysqli ;

  
    $query = "UPDATE tbl_encuestas SET estado = '1' WHERE id_encuesta = '$id_encuesta'";
    $resultado = $mysqli->query($query);

    return $resultado;
  
    
  }




  function mostrarencuestas()
  {

      global $mysqli ;

  
$query = "SELECT * FROM tbl_encuestas ORDER BY id_encuesta DESC";
$resultado = $mysqli->query($query);

    return $resultado;
  
    
  }




 ?>


