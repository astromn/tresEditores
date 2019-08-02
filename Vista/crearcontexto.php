

<?php

  include("../modelo/funcs/conexion.php") ;

  session_start();

  $id_encuesta = $_GET['id_encuesta'];

   $_SESSION['id_encuesta'] = $id_encuesta;



  $query = "SELECT * FROM tbl_encuestas WHERE id_encuesta = '$id_encuesta'";
  $respuesta = $mysqli->query($query);
  $row = $respuesta->fetch_assoc();


 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<link rel="stylesheet" href="../css/bootstrap.min.css">

   
   <link rel="stylesheet" href="../css/bootstrap-theme.min.css" >   


	 <script src="../jsprograma/js/jquery-3.3.1.min.js" ></script> 
   <script src="../jsprograma/js/popper.min.js"></script>         
    <script src="../jsprograma/js/bootstrap.min.js" ></script>
    <script src="../jsprograma/jsprofesor/crudcontextos.js"></script>
      
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
            	   <input type="hidden" id="id_encuesta" value="<?php echo $row['id_encuesta'] ?>">
              <h3>CONTEXTO DE PREGUNTAS </h3>
            </div>
            <div class="col-md-2 col-xs-12">
               <button class="float-right btn btn-primary" id="boton_agregar">
                      Agregar contexto 
                  </button>
            </div>
          </div>
      </div>
      <hr/>
      <div class="row">
          <div class="col-md-12">
              <h4>Contextos:</h4>
              <div class="table-responsive">
                <div id="tabla_contexto"></div>
              </div>
          </div>
      </div>
  </div>


 
     




<div class="modal fade" id="modal_agregar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Agregar Nueva Contextos</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

              <form name="formulario-envia"  id="formulario-envia" enctype="multipart/form-data" method="post" >

            <div class="modal-body">

              <div class="form-group row">
                <label for="titulo" class="col-sm-3 col-form-label">Título</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" autocomplete="off" autofocus>
                </div>
              </div>
              <div class="form-group row">
                <label for="descripcion" class="col-sm-3 col-form-label">Descripción</label>
                <div class="col-sm-9">
                  <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Contexto" rows="15" cols="50"></textarea>
                </div>
              </div>


                 <div class="form-group row">
                <label for="imagenes" class="col-sm-3 col-form-label">agragar imagen </label>
                <div class="col-sm-9">
                  <input type="file" id="imagen" name="imagen" >
                </div>
              </div>
         

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <input type="button"  class="btn btn-primary" value="agregar contexto"  onclick="agregar_contextos()">             
       
              
            </div>             

             </form>                     
            

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
                  <textarea class="form-control" id="modificar_descripcion" placeholder="Descripción" rows="15" cols="50"></textarea>
                </div>
              </div>

           
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="modificarDetallescontexto()">Modificar Encuesta</button>
                <input type="hidden" id="hidden_id_opcion">
            </div>

        </div>
    </div>
</div>

 


</body>
</html>


</body>
</html>