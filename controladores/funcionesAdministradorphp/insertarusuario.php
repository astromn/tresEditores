<?php 

require '../../modelo/funcs/conexion.php';
require '../../modelo/funcs/funcs.php';



$documento=$_POST['documento'];
$nombre= $_POST['nombre'];
$apellido=$_POST['apellido'];
$correo= $_POST['correo'];
$fecha= $_POST['fecha'];
$genero= $_POST['genero'];
$tipo= $_POST['tipo'];
$institucion= $_POST['institucion'];
$password=$_POST['password'];
$con_password=$_POST['con_password'];



$activacion=1;
$ultima= '';
$solicitud='';
$token = generateToken(); 

  $valor = 0;
  $result ='';




if (!validaPassword($password,$con_password)) { 
  
  
  $valor++;
  $result=2;
}else {

	 if (usuarioExiste($documento)) {  
 
  $valor++;
  $result=3;
  } else {


    if ($valor==0){       

        $registro =registraUsuario($documento,$nombre,$apellido,$correo,$fecha,$genero,$tipo,$institucion,$password,$activacion,$token,$ultima,$solicitud); 

        $result=$registro;  
    }
  }
}
    

 echo $result;
   



 ?>