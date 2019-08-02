<?php 


  include ('conexion.php');

function mostaropciones($id_orden)
	{


      global $mysqli ;

 
 $query = "SELECT * FROM  tbl_opciones WHERE id_orden = '$id_orden'";
$resultado = $mysqli->query($query);   

    return $resultado;
	
		
	}



function mostaropcionesfv($id_orden)
	{


      global $mysqli ;

     $sql= "SELECT * FROM tbl_opcionesfv WHERE id_orden = '$id_orden'"; 
$resultado = $mysqli->query($sql);

    return $resultado;
	
		
	}


function insertaropciones($id_orden, $valor,$valorres)
	{


      global $mysqli ;

   
  $query = "INSERT INTO tbl_opciones (id_orden, valor,respuesta)
              VALUES ('$id_orden', '$valor','$valorres')";

    $resultado = $mysqli->query($query);

    return $resultado;
	
		
	}



function insertaropcionesfv($id_orden, $txtfv)
	{
      global $mysqli ;

   
  $query = "INSERT INTO tbl_opcionesfv (id_orden, valor)
              VALUES ('$id_orden', '$txtfv')";

    $resultado = $mysqli->query($query);
    
    return $resultado;
	
		
	}



function eliminaropciones($id_opcion)
	{


      global $mysqli ;
 $query = "DELETE FROM tbl_opciones WHERE id_opcion = '$id_opcion'";    
          $resultado = $mysqli->query($query);
    
    return $resultado;
	
		
	}



function eliminaropcionesfv($id_opcion)
	{


      global $mysqli ;
  $query = "DELETE FROM tbl_opcionesfv WHERE id_opcion = '$id_opcion'";    
          $resultado = $mysqli->query($query);
    
    return $resultado;
	
		
	}



function agregaropcionimagen($id_orden,$nom,$respuesta)
	{


      global $mysqli ;
 
  $query = "INSERT INTO tbl_opcionesimagen ( id_orden, imagen,respuesta)
              VALUES ('$id_orden','$nom','$respuesta')";

    $resultado = $mysqli->query($query);
    
    return $resultado;
	
		
	}



function eliminaropcionimagen($id_orden)
	{


      global $mysqli ;
 
  $query = "DELETE FROM tbl_opcionesimagen WHERE id_imagen = '$id_orden'";
    $resultado = $mysqli->query($query);
    
    return $resultado;
	
		
	}




function mostaropcionimagen($id_orden)
	{


      global $mysqli ;

    $query = "SELECT * FROM  tbl_opcionesimagen WHERE id_orden = '$id_orden'";
   
$resultado = $mysqli->query($query);
    
    return $resultado;
	
		
	}


 ?>


