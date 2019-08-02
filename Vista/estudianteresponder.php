<?php

  	require "../modelo/funcs/conexion.php";

    session_start();

  	$id_encuesta = $_GET['id_encuesta'];

     $_SESSION['id_encuestas'] = $id_encuesta; 


    $query3 = "SELECT tbl_encuestas.titulo, tbl_encuestas.descripcion 
    FROM tbl_contexto
    INNER JOIN tbl_encuestas
    ON tbl_contexto.id_encuesta =tbl_encuestas.id_encuesta
    WHERE tbl_contexto.id_encuesta = '$id_encuesta'";
    $respuesta3 = $mysqli->query($query3);
     $row3 = $respuesta3->fetch_assoc();




  $numero_p=" SELECT COUNT(p.id_pregunta) from tbl_encuestas e INNER join tbl_contexto c on (e.id_encuesta =c.id_encuesta) INNER JOIN tbl_preguntas p on (c.id_contexto = p.id_contexto) WHERE e.id_encuesta='$id_encuesta'";

         $cont= $mysqli->query($numero_p);

         while ($mostarcont=mysqli_fetch_array($cont)){ 
         $numeropre=$mostarcont[0]; 
            }  


        

 ?>

<!DOCTYPE html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">




  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">

  <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap-theme.css">

 <link rel="stylesheet" type="text/css" href="../librerias/css/alertify.css">
     <link rel="stylesheet" type="text/css" href="../librerias/css/themes/default.css">


  <link rel="stylesheet" type="text/css" href="../css/index_style.css">

  <title>Responder</title>
</head>
<body>


     
  <input type="hidden" value="<?php    echo $numeropre;?>" id="tamma" name="tamma"> 




     <div class="container text-center">
       
  <h1><?php echo $row3['titulo'] ?></h1>
    <p><?php echo $row3['descripcion'] ?></p>


     </div>


    <div class="container">
    	 

         <div class="registros" id="agrega-registros"></div>

         <br>
          <br>
           <br>
           

    <center>
      
      <ul class="pagination" id="pagination"></ul> 
    </center>

  


    </div>



    
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../jsprograma/js/jquery-3.3.1.min.js"></script>
  <script src="../jsprograma/js/popper.min.js"></script>
  <script src="../jsprograma/js/bootstrap.min.js"></script>
      <script src="../librerias/alertify.js" ></script>
    <script src="../jsprograma/jsestudiante/visualizarpreguntas.js"></script>
    <script type="text/javascript" src="../jsprograma/jsestudiante/datosevaluacion.js"></script>
  
</body>
</html>

