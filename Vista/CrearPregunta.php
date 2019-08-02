
<?php

  include("../modelo/funcs/conexion.php") ;

  session_start();

  $id_contexto = $_GET['id_contexto'];

   $_SESSION['id_contexto'] = $id_contexto;

  $query = "SELECT * FROM tbl_contexto WHERE id_contexto = '$id_contexto'";
  $respuesta = $mysqli->query($query);
  $row = $respuesta->fetch_assoc();


  $query3 = "SELECT * FROM tipo_pregunta";
  $respuesta3 = $mysqli->query($query3);

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
    <script src="../jsprograma/jsprofesor/crudpregunta.js"></script>


    <title>ADMIN-Preguntas</title>
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
              <h3><?php echo $row['titulocontexto'] ?></h3>
            </div>
            <div class="col-md-2 col-xs-12">
               <button class="float-right btn btn-primary" id="boton_agregar">
                  Agregar Pregunta
                </button>
            </div>
          </div>
      </div>
      <hr/>
      <div class="row">
          <div class="col-md-12">
              <h4>Preguntas:</h4>
              <input type="hidden" id="id_contexto" value="<?php echo $row['id_contexto'] ?>">
              <div class="table-responsive">
                <div id="tabla_preguntas"></div>  
              </div>
          </div>
      </div>
  </div>
  <!-- /Content Section -->


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->


</body>
</html>

<!-- Modal Agregar Nueva Pregunta -->
<div class="modal fade" id="modal_agregar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Agregar Nueva Pregunta</h4>
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
                <label for="descripcion" class="col-sm-3 col-form-label">Agregar Ayuda </label>
                <div class="col-sm-9">
                  <textarea class="form-control" id="ayuda" name="ayuda" placeholder="Agregar Ayuda" rows="5" cols="5"></textarea>
                </div>
              </div>



              <div class="form-group row">
                <label for="titulo" class="col-sm-3 col-form-label">Tipo</label>
                <div class="col-sm-9">
                  <select id="tipo_pregunta" class="form-control">
                     <option   disabled selected > Seleccionar </option> 
                  <?php 
                  while ($row3 = $respuesta3->fetch_assoc()) {
                   ?>
                    <option id="id_tipo_pregunta" value="<?php echo $row3['id_tipo_pregunta'] ?>" required><?php echo $row3['nombre'] ?></option>
                  <?php 
                  }
                   ?>
                  </select>
                </div>
              </div> 




                     <input type="hidden" value="" id="tipopregunta">  
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="agregarPregunta()">Agregar Pregunta</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal Modificar Pregunta -->
<div class="modal fade" id="modal_modificar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Modificar Pregunta</h4>
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
            </div>


                <div class="form-group row">
                <label for="descripcion" class="col-sm-3 col-form-label">Agregar Ayuda </label>
                <div class="col-sm-9">
                  <textarea class="form-control" id="modificar_ayuda" name="modificar_ayuda" placeholder="Agregar Ayuda" rows="5" cols="5"></textarea>
                </div>
              </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="modificarDetallesPregunta()">Modificar Pregunta</button>
                <input type="hidden" id="hidden_id_pregunta">
            </div>

        </div>
    </div>
</div>


<script type="text/javascript">
   $(document).ready(function(){
      
        $("#tipo_pregunta").change(function(){
            var valor=$("#tipo_pregunta").val();
           
           document.getElementById("tipopregunta").value = valor;
        });
    })

</script>