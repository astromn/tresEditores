<?php
	session_start();
	require '../modelo/funcs/conexion.php';
	include '../modelo/funcs/funcs.php';
	
	if(!isset($_SESSION["id_usuario"])){ //Si no ha iniciado sesión redirecciona a index.php
		header("Location: ../index.php");
	}
	
	$idUsuario = $_SESSION['id_usuario'];
	
	$sql = "SELECT usu_id, usu_nombre FROM tbl_usuario WHERE usu_id = '$idUsuario'";
	$result = $mysqli->query($sql);
	
 	$row = $result->fetch_assoc();
?>
 
<html>
	<head>
		<title>Welcome</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css" >
		<link rel="stylesheet" href="../css/bootstrap-theme.min.css" >


	 <script src="../jsprograma/js/jquery-3.3.1.min.js" ></script> 
    <script src="../jsprograma/js/popper.min.js"></script>         
    <script src="../jsprograma/js/bootstrap.min.js" ></script>
		
		
		<style>
			body {
			padding-top: 20px;
			padding-bottom: 20px;
			}
		</style>
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


		
		<div class="container" style="margin-top:50px;">

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="welcome.php">Inicio</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav mr-auto">   


      	<?php if($_SESSION['tipo_usuario']==1) { ?>
		<li class="nav-item active">
        <a class="nav-link" href="crudadministrador.php">Administrador <span class="sr-only">(current)</span></a>
        </li>
		<?php } ?>



      	<?php if($_SESSION['tipo_usuario']==2) { ?>
		<li class="nav-item active">
        <a class="nav-link"  href='vistaestudiante.php'>Encuestas <span class="sr-only">(current)</span></a>
        </li>
		<?php } ?>


      	<?php if($_SESSION['tipo_usuario']==3) { ?>
		<li class="nav-item active">
        <a class="nav-link"a href='crearEncuesta.php'>Crear Encuesta <span class="sr-only">(current)</span></a>
         
        </li>
		<?php } ?>    
    
    </ul>
    <form class="form-inline my-2 my-lg-0">      

      <li><a class="btn btn-outline-success my-2 my-sm-0" href='logout.php'>Cerrar Sesi&oacute;n</a></li>
    </form>
  </div>
</nav>


  <div class="card-body">
    

    <h2><?php echo ' '.utf8_decode($row['usu_nombre']); ?></h1> 
  
  </div>		
			
		</div>


	</div>

	</body>
</html>


<script src="../jsprograma/js/bootstrap.min.js" ></script>




  <script type="text/javascript" language="javascript">   
      history.pushState(null, null, location.href);
      window.onpopstate = function () {
        history.go(1);
      };
    </script>