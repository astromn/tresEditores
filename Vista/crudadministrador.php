<?php  
   
   session_start();

   unset($_SESSION['consulta']);


 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>


  <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">

     <link rel="stylesheet" type="text/css" href="../librerias/select2/css/select2.css">

  <script src="../librerias/jquery-3.2.1.min.js"></script>
  <script src="../librerias/bootstrap/js/bootstrap.js"></script>
  <script src="../librerias/alertifyjs/alertify.js"></script>
  
<script type="text/javascript" src="../jsprograma/js/popper.min.js"></script>   
      <script src="../librerias/select2/js/select2.js"></script>
     <script src="../jsprograma/funcionesAdministrador/funciones.js" ></script>
</head>
<body>

 


  <br/> 
  <br/> 
  
  <br/>

     <div class="container"> 

<div id="buscar"> </div>

  <div id="tabla"></div>

  </div>
	<div>

 


<div class="modal fade" id="modalactualizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-ms" role="document">
    <div class="modal-content  modal-lg">
      <div class="modal-header modal-lg">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> Actualizar Datos Usuario </h4>
      </div>
      <div class="modal-body">

        <form   class="form-horizontal"  > 
            <div class="form-group">
         <label for="id " class="col-md-3 control-label">id usuario:</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="id" id="id" placeholder="id" disabled=”disabled”  value="<?php if(isset($id)) echo $id; ?>" required >
                </div>                       

               <label for="documento" class="col-md-3 control-label">Documento:</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="documento" id="documento" placeholder="documento" value="<?php if(isset($documento)) echo $documento; ?>" required >
                </div>  

                 <label for="nombre" class="col-md-3 control-label">Nombre:</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nombre"  id="nombre" placeholder="Nombre" value="<?php if(isset($nombre)) echo $nombre; ?>" required >
                </div> 

                 <label for="apellido" class="col-md-3 control-label">Apellido</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido" value="<?php if(isset($apellido)) echo $apellido; ?>" required>
                </div>


                 <label for="email" class="col-md-3 control-label">Email</label>
                <div class="col-md-9">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php if(isset($email)) echo $email; ?>" required>
                </div>

                   <label for="fecha" class="col-md-3 control-label">fecha nacimiento</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="fecha" id="fecha" placeholder="fecha" value="<?php if(isset($fecha)) echo $fecha; ?>" required>
                </div>

                 <label for="genero" class="col-md-3 control-label"> genero</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="genero" id="genero" placeholder="genero" value="<?php if(isset($genero)) echo $genero; ?>" required>
                </div>

                <label for="tipo" class="col-md-3 control-label"> tipo usuario </label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="tipo" id="tipo" placeholder="tipo usuario" value="<?php if(isset($tipo)) echo $tipo; ?>" required>
                </div>

                <label for="institucion" class="col-md-3 control-label"> institucion </label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="institucion" id="institucion" placeholder="institucion" value="<?php if(isset($institucion)) echo $institucion; ?>" required>
                </div>

                  <label for="password" class="col-md-3 control-label"> password </label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="password" id="password" placeholder="password" value="<?php if(isset($password)) echo $password; ?>" required>
                </div> 



                </div>
                </form>         
                
          
      </div>

    
        <div class="modal-footer">     
        <button type="button" id="actulizar" class="btn btn-primary" data-dismiss="modal"> Actualizar Datos </button>
      </div>
    </div>
  </div>
</div>
  </div>

  


</body>
</html>


<script type="text/javascript">
	$(document).ready(function(){
		$('#tabla').load('../componentes/tablausuarios.php');
      $('#buscar').load('../componentes/buscadordocumento.php');


	});

</script>



<script type="text/javascript">
    $(document).ready(function(){
      $('#actualizaru').click(function(){

      });

      $('#actulizar').click(function(){
         actualizardatos();
      });

    });
</script>