

<?php 

 
 function  eliminarusuario($id) {


$servename = "localhost";
$database = "bdproyecto";
$username = "root";
$password = "";

// conexion al servidor 

$con = mysqli_connect($servename, $username, $password, $database);
//conexion al base de datos 
mysqli_select_db($con, $database);




  $eliminar = " DELETE FROM tbl_usuario WHERE USU_ID='{$id}'";


if($con->query($eliminar)===TRUE){
   return 1;
   
  }else{
   return 0;
 
  }


 	
 }

 function buscarestudiantes()
	{
		global $mysqli;
		
		 $sql="SELECT  USU_ID,USU_DOCUMENTO,USU_NOMBRE,USU_APELLIDO ,USU_CORREO,USU_FECHA_NACIMIENTO,USU_GENERO ,USU_TIPO_USUARIO,USU_INSTITUCION ,USU_PASSWORD,USU_ULTIMA_SESION FROM tbl_usuario";
     $result=mysqli_query($mysqli,$sql);

		return $result;
		
		 
	}



		function buscarestudiantedoc($id)
	{
		global $mysqli;
		
		 $sql="SELECT  USU_ID,USU_DOCUMENTO,USU_NOMBRE,USU_APELLIDO ,USU_CORREO,USU_FECHA_NACIMIENTO,USU_GENERO ,USU_TIPO_USUARIO,USU_INSTITUCION ,USU_PASSWORD,USU_ULTIMA_SESION FROM tbl_usuario where USU_ID ='$id'";
     $result=mysqli_query($mysqli,$sql);

		return $result;
		
		 
	}






 ?> 