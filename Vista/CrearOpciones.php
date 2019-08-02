<?php

include("../modelo/funcs/conexion.php") ;
include("../modelo/funcs/opcionesphp.php");

session_start();

$id_pregunta = $_GET['id_pregunta'];
 $_SESSION['id_pregunta'] = $id_pregunta;


  $id_orde=" SELECT tbl_orden.id_orden from  tbl_orden WHERE tbl_orden.id_pregunta= '$id_pregunta'";

         $orden = $mysqli->query($id_orde);

         while ($mostarorden=mysqli_fetch_array($orden)){ 
         $id_orden=$mostarorden[0]; 
            } 


  $_SESSION['id_orden'] = $id_orden;

$query = "SELECT * FROM  tbl_preguntas WHERE id_pregunta = '$id_pregunta'";
$respuesta = $mysqli->query($query);

$row = $respuesta->fetch_assoc();


   $tipopregunta= tipopregunta($id_pregunta);
 

  while ($mostar=mysqli_fetch_array($tipopregunta)){ 
         $tipopre =$mostar[0];
            $_SESSION['tipopre'] =  $tipopre;
          
            }


 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   
  <link rel="stylesheet" href="../css/bootstrap.min.css">

   
   <link rel="stylesheet" href="../css/bootstrap-theme.min.css" >   


   <script src="../jsprograma/js/jquery-3.3.1.min.js" ></script> 
   <script src="../jsprograma/js/popper.min.js"></script>         
    <script src="../jsprograma/js/bootstrap.min.js" ></script>
    <script src="../jsprograma/jsprofesor/crudopcion.js"></script>

    <title>ADMIN-Opciones</title>
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

  <!-- Content Section -->
  <div class="container" style="margin-top: 30px;">
      <div class="row">
          <div class="col-md-12 row">
            <div class="col-md-10 col-xs-12">
              <h3><?php echo $row['titulo'] ?></h3>
            </div>
            <div class="col-md-2 col-xs-12">
               <button class="float-right btn btn-primary" id="boton_agregar">
                  Agregar Opción
                </button>
            </div>
          </div>
      </div>
      <hr/>
      <div class="row">
          <div class="col-md-12">
              <h4>Opciones:</h4>
              <input type="hidden" id="id_pregunta" value="<?php echo  $_SESSION['id_orden'] ?>">
              <div class="table-responsive">
                <div id="tabla_opciones"></div>
              </div>
          </div>
      </div>
  </div>
  <!-- /Content Section -->


  <!-- Optional JavaScript -->

 

</body>
</html>

<!-- Modal Agregar Nueva Opción -->



<div class="modal fade" id="modal_agregar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Agregar Nueva Opción</h4>
              <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

              <?php 

              if($tipopre==1 ) {

                print('  <div class="form-group row">
                <label for="valor" class="col-sm-3 col-form-label">Opción</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="valor" placeholder="Opción" autocomplete="off" autofocus>
                </div> </div>




                       <div class="form-group row">
                <label for="valor" class="col-sm-3 col-form-label">Respuesta</label>
                <div class="col-sm-9">
                  <select id="valorres" class="form-control">
                    <option   disabled selected > Seleccionar </option> 
                  <option value="Correcta"> Correcta </option> 
                  <option value="Incorrecta">Incorrecta</option>                 
                  </select>
                </div>             

              </div>
                '
              );

              }
               ?>           

                <?php 

                if($tipopre==2){

                  print('
                       <div class="form-group row">
                <label for="valor" class="col-sm-3 col-form-label">Opción</label>
                <div class="col-sm-9">
                  <select id="tipopfv" class="form-control">
                    <option   disabled selected > Seleccionar </option> 
                  <option value="Falso"> Falso </option> 
                  <option value="Verdadero">Verdadero</option>                 
                  </select>
                </div>             

              </div>

               ');
                }

                 ?>

                 

                 <input type="hidden" value="" id="tipofv"> 
                 <input type="hidden" value="" id="id_tipo">
                   <input type="hidden" value="" id="valorrespuesta"> 
 



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="agregarOpcion()">Agregar Opción</button>
            </div>

        </div>
    </div>
</div>





<!-- Modal Modificar Pregunta -->
<div class="modal fade" id="modal_modificar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Modificar Opción</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">   

              <?php 

              if($tipopre==1 ) {

                print(' <div class="form-group row">
                <label for="modificar_valor" class="col-sm-3 col-form-label">Valor</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="modificar_valor" placeholder="Valor">
                </div>
              </div>  

                       <div class="form-group row">
                <label for="valor" class="col-sm-3 col-form-label">Respuesta</label>
                <div class="col-sm-9">
                  <select id="valorres" class="form-control">
                    <option   disabled selected > Seleccionar </option> 
                  <option value="Correcta"> Correcta </option> 
                  <option value="Incorrecta">Incorrecta</option>                 
                  </select>
                </div>             

              </div>');

              }
               ?>           

                <?php 

                if($tipopre==2){

                  print('
                       <div class="form-group row">
                <label for="valor" class="col-sm-3 col-form-label">Valor</label>
                <div class="col-sm-9">
                  <select id="tipopfv" class="form-control">
                    <option   disabled selected > Seleccionar </option> 
                  <option value="Falso"> Falso </option> 
                  <option value="Verdadero">Verdadero</option>                 
                  </select>
                </div>             

              </div> ');
                }

                 ?>         
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="modificarDetallesOpcion()">Modificar Opción</button>
                <input type="hidden" id="hidden_id_opcion">
            </div>

        </div>
    </div>
</div>



<script type="text/javascript">
   $(document).ready(function(){

     var tipoid=<?php echo  $tipopre ?>

       document.getElementById("id_tipo").value = tipoid;

       document.getElementById("tipofv").value = "vacio";

      
        $("#tipopfv").change(function(){
          
            var valor=$("#tipopfv").val();   
            
            
           document.getElementById("tipofv").value = valor;
           if(tipoid==2){

            document.getElementById("id_tipo").value = tipoid;         

          }


        });

             $("#valorres").change(function(){
          
            var valor=$("#valorres").val();   
            
            
           document.getElementById("valorrespuesta").value = valor;
         

        });
    })

</script>