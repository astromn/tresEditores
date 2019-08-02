
<?php 


    session_start();
	include('../modelo/funcs/conexion.php');


       $numerop = $_SESSION['numerop'] ;
     $id_usuario =  $_SESSION['id_usuario'];

      $id_encuesta  =  $_SESSION['id_encuestas'] ;

    


    
       $respuesta="  SELECT  tbl_resultados.numero_malas , tbl_resultados.numero_buenas FROM tbl_resultados WHERE tbl_resultados.id_encuesta = '$id_encuesta'";

         $respuestas = $mysqli->query($respuesta);

         while ($mostarres=mysqli_fetch_array($respuestas)){ 
         $premalas=$mostarres[0]; 
          $prebuenas=$mostarres[1];         

            } 



       
       
 ?>

 <!DOCTYPE html>
 <html>
 <head>
   <title></title>

  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">


   <script type="text/javascript" src="../librerias/jquery-3.2.1.min.js"></script>
  <script src="../jsprograma/js/popper.min.js"></script>
  <script src="../jsprograma/js/bootstrap.min.js"></script>


 </head>
 <body>

  <div class="container"  style="margin-top:50px;"> 

  <div class="card" style="max-height: 100rem ;">
  <h5 class="card-header h5">Resultado De La Encuesta </h5>
  <div class="card-body">

     <div class="container" align="center">


        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-8 col-sm-8 col-sm-offset-2">

    <div class="panel panel-danger"  >
      <div class="panel-heading">
       Resultado 
      </div> 
      <div class="panel-body">
      


    <div class="input-group">
              <div class="col-md-5" >
                <label >Numero De Preguntas :</label>
                </div>
                <div class="col-md-2">
                     <label for="nombre" ><?php  echo $numerop ;  ?></label>
                </div>
              </div>

         <div class="input-group">
                 <div class="col-md-5" >
                <label for="nombre" >Preguntas Correctas :</label>
                </div>
                <div class="col-md-2">
                     <label for="nombre" > <?php echo $prebuenas; ?></label>
                </div>
              </div>
              


        <div class="input-group">
                 <div class="col-md-5 " >
                <label for="nombre" >Preguntas  Incorrectas :</label>

                </div>
                <div class="col-md-2">
                     <label for="nombre" > <?php echo $premalas; ?></label>
                </div>
              </div>

              <br/>



        <div align="center">
                <a class="btn btn-outline-success my-2 my-sm-0" href='welcome.php'>Volver</a>
              </div>

              </div>  


      </div>
      
    </div>

     </div>

    
 
 </body>
 </html>



  <script type="text/javascript" language="javascript">   
      history.pushState(null, null, location.href);
      window.onpopstate = function () {
        history.go(1);
      };
    </script>



