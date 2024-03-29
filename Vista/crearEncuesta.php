<?php 

session_start();
 
  if(!isset($_SESSION["id_usuario"])){ //Si no ha iniciado sesión redirecciona a index.php
    header("Location: index.php");
  } 




  date_default_timezone_set("America/Lima");
  $date = new DateTime();

  $fecha_inicio = $date->format('Y-m-d H:i:s');
  
 ?>



<!DOCTYPE html>
<html>
<head>
	<title> Crear Encuesta</title>

      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<link rel="stylesheet" href="../css/bootstrap.min.css">

   
   <link rel="stylesheet" href="../css/bootstrap-theme.min.css" >   


	 <script src="../jsprograma/js/jquery-3.3.1.min.js" ></script> 
   <script src="../jsprograma/js/popper.min.js"></script>         
    <script src="../jsprograma/js/bootstrap.min.js" ></script>
    <script src="../jsprograma/jsprofesor/crudencuesta.js"></script>

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



 


      <div class="container" style="margin-top: 30px;">
      <div class="row">
          <div class="col-md-12 row">
            <div class="col-md-10 col-xs-12">
              <h3>SISTEMA DE ENCUESTAS</h3>
            </div>
            <div class="col-md-2 col-xs-12">
               <button class="float-right btn btn-primary" id="boton_agregar">
                      Agregar Encuesta
                  </button>
            </div>
          </div>
      </div>
      <hr/>
      <div class="row">
          <div class="col-md-12">
              <h4>Encuestas:</h4>
              <div class="table-responsive">
                <div id="tabla_encuestas"></div>
              </div>
          </div>
      </div>
  </div>


 
     




<div class="modal fade" id="modal_agregar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Agregar Nueva Encuesta</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

              <div class="form-group row">
                <label for="titulo" class="col-sm-3 col-form-label">Título</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="titulo" placeholder="Título" autocomplete="off" autofocus>
                </div>
              </div>
              <div class="form-group row">
                <label for="descripcion" class="col-sm-3 col-form-label">Descripción</label>
                <div class="col-sm-9">
                  <textarea class="form-control" id="descripcion" placeholder="Descripción"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="fecha_final" class="col-sm-3 col-form-label">Fecha Final</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="fecha_final" value="<?php echo $fecha_inicio ?>"  autocomplete="off">
                  <p>Fomato: año-mes-día horas:minutos:segundos</p>
                </div>
              </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="agregarEncuesta()">Agregar Encuesta</button>
                <input type="hidden" id="hidden_id_usuario" value="<?php echo $_SESSION['id_usuario'] ?>">

              
            </div>

        </div>
    </div>
</div>

<!-- Modal Modificar Producto -->
<div class="modal fade" id="modal_modificar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Modificar Producto</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

              <div class="form-group row">
                <label for="modificar_titulo" class="col-sm-3 col-form-label">Título</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="modificar_titulo" placeholder="Título">
                </div>
              </div>

              <div class="form-group row">
                <label for="descripcion" class="col-sm-3 col-form-label">Descripción</label>
                <div class="col-sm-9">
                  <textarea class="form-control" id="modificar_descripcion" placeholder="Descripción"></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label for="fecha_final" class="col-sm-3 col-form-label">Fecha Final</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="modificar_fecha_final" placeholder="Fecha de Cierre" autocomplete="off"
                  value="<?php echo $fecha_inicio ?>">
                  <p>Fomato: año-mes-día horas:minutos:segundos</p>
                </div>
              </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="modificarDetallesEncuesta()">Modificar Encuesta</button>
                <input type="hidden" id="hidden_id_encuesta">
            </div>

        </div>
    </div>
</div>

 


</body>
</html>


