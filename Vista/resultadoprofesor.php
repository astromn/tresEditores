<?php 

 require '../modelo/funcs/conexion.php';
  include '../modelo/funcs/funcs.php';


  $id_encuesta = $_GET['id_encuesta'];



 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
   
  <link rel="stylesheet" href="../css/bootstrap.min.css">

   
   <link rel="stylesheet" href="../css/bootstrap-theme.min.css" >   


   <script src="../js/jquery-3.3.1.min.js" ></script> 
   <script src="../js/popper.min.js"></script>         
    <script src="../js/bootstrap.min.js" ></script>

 </head>

 <body>


   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="javascript:void(0)">Sistema de Encuestas</a>
     
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
      <span class="navbar-toggler-icon"></span>
    </button>
    

    <!--NAVBAR-->
    <div class="collapse navbar-collapse" id="navb">
      <ul class="navbar-nav mr-auto">
      </ul>
      <form class="form-inline my-2 my-lg-0" style="color: #fff">         
     
         
      </form>
    </div>
  </nav> 



  <div class="container"  style="margin-top: 30px;"> 

  	     <div class="row">
          <div class="col-md-12 row">
            <div class="col-md-10 col-xs-12">
            	   <input type="hidden" id="id_encuesta" value="<?php echo $row['id_encuesta'] ?>">
              <h3>Resultado De Encuesta </h3>
            </div>
          
          </div>
      </div>


    <table class="table table-bordered table-hover table-condensed">
        <thead class="thead-dark">
            <tr>
                <th>Documento</th>
                <th>Nombre</th>
                <th >Apellido</th>
                <th>Preguntas Correctas</th>
                <th>Preguntas Incorrectas</th>              
            </tr>
        </thead>

        <?php 
        $query = "SELECT tbl_usuario.USU_DOCUMENTO, tbl_usuario.USU_NOMBRE,tbl_usuario.USU_APELLIDO , tbl_resultados.numero_buenas ,tbl_resultados.numero_malas from tbl_resultados inner JOIN tbl_usuario on(tbl_usuario.USU_ID=tbl_resultados.id_estudiante) where tbl_resultados.id_encuesta =' $id_encuesta'";
$resultado = $mysqli->query($query);

while ($row = $resultado->fetch_assoc()) {
 ?>



         <tbody>
            <tr>
                <td> <?php echo  $row["USU_DOCUMENTO"] ;?> </td>
                <td> <?php echo  $row["USU_NOMBRE"] ;?> </td>
                  <td> <?php echo  $row["USU_APELLIDO"] ;?> </td>
                    <td> <?php echo  $row["numero_buenas"] ;?> </td>
                      <td> <?php echo  $row["numero_malas"] ;?> </td>
               
            
            </tr>
        </tbody>

<?php } ?>

    </table>

    </div>
 
 </body>
 </html>

