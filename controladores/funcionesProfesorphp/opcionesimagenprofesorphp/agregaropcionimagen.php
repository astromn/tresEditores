


<?php 
include("../../../modelo/funcs/crudopciones.php");
 session_start();


  $id_orden=$_SESSION['id_orden'] ; 

     $respuesta = $_POST['valorrespuesta'];   

  
  
     $nom = $_FILES['imagen']['name'];

     $ruta ='imagenesopcion/'.$nom;

     echo $respuesta;
 echo $ruta."--------";
      


    

    if(move_uploaded_file($_FILES['imagen']["tmp_name"],$ruta)){

      
       echo "image cargada";
    }else{

      echo "imagen no cargada ";
    }
    

    agregaropcionimagen($id_orden,$nom,$respuesta);




 ?>