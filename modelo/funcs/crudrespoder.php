<?php 



  include ('conexion.php');



function mostrarevaluacion()
	{


      global $mysqli ;
$query = "SELECT * FROM tbl_encuestas WHERE estado = '1'";
$resultado = $mysqli->query($query);
    
    return $resultado;
	
		
	}





function insertarresultado($premalas, $prebuenas,$id_usuario,$id_encuesta)
	{


      global $mysqli ;

  $query = "INSERT INTO tbl_resultados(numero_malas, numero_buenas, id_estudiante, id_encuesta) 
              VALUES ('$premalas', '$prebuenas','$id_usuario','$id_encuesta')";

    $resultado = $mysqli->query($query);
    
    return $resultado;
	
		
	}






function consultarencuesta($id_encuestas)
	{


      global $mysqli ;
      
  $numero_p=" SELECT * FROM tbl_contexto WHERE tbl_contexto.id_encuesta='$id_encuestas'";

         $cont= $mysqli->query($numero_p);
    
    return $cont;
	
		
	}






function numeropreguntas($id_encuestas)
	{


      global $mysqli ;
      
 

  $numero_p=" SELECT COUNT(p.id_pregunta) from tbl_preguntas p INNER JOIN tbl_contexto c on (p.id_contexto=c.id_contexto) WHERE c.id_encuesta=' $id_encuestas'";


         $resultado= $mysqli->query($numero_p);

    
    return $resultado;
	
		
	}




function  mostrapreguntasen($id_encuestas, $limit, $nroLotes)
	{


      global $mysqli ;
      
   $query2 = "SELECT p.id_pregunta,p.titulo,p.id_tipo_pregunta ,p.ayudaestudiante, c.titulocontexto,c.descripcion,c.imagen from tbl_preguntas p INNER JOIN tbl_contexto c on (p.id_contexto=c.id_contexto) WHERE c.id_encuesta='$id_encuestas'  LIMIT $limit, $nroLotes";

    $resultado = $mysqli->query($query2);

       

    
    return $resultado;
	
		
	}





function  mostraropciones($id)
	{


      global $mysqli ;
      
 

     $query = "SELECT tbl_orden.id_orden,tbl_opciones.id_opcion, tbl_opciones.valor  from tbl_orden INNER JOIN tbl_opciones on (tbl_orden.id_orden=tbl_opciones.id_orden) WHERE tbl_orden.id_pregunta='$id'";

      $resultado = $mysqli->query($query);
    
    return $resultado;
	
		
	}








function  mostraropcionesfv($id)
	{


      global $mysqli ;
      
 

   
           $fv="SELECT tbl_opcionesfv.id_opcion FROM tbl_orden INNER join tbl_opcionesfv on (tbl_orden.id_orden=tbl_opcionesfv.id_orden) WHERE tbl_orden.id_pregunta='$id'"; 



      $resultado = $mysqli->query($fv);

    
    return $resultado;
	
		
	}






function  mostraropcionesimagen($id)
	{


      global $mysqli ;
      
 


  $valorimagen = "SELECT tbl_orden.id_orden,tbl_opcionesimagen.id_imagen, tbl_opcionesimagen.imagen from tbl_orden INNER JOIN tbl_opcionesimagen on (tbl_orden.id_orden=tbl_opcionesimagen.id_orden) WHERE tbl_orden.id_pregunta='$id'"; 


  
      $respuestas = $mysqli->query($valorimagen);


    
    return $respuestas;
	
		
	}






 ?>