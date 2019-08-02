
<?php 
include("../../../modelo/funcs/crudcontexto.php");
 session_start();


  $id_encuesta=$_SESSION['id_encuesta'] ;    

    $titulo        = $_POST['titulo'];
    $descripcion   = $_POST['descripcion'];
  
     $nom = $_FILES['imagen']['name'];

     $ruta ='imagenesf/'.$nom;   


    

    if(move_uploaded_file($_FILES['imagen']["tmp_name"],$ruta)){

      
      // echo "image cargada";
    }else{

     // echo "imagen no cargada ";
    }
    
    insertarcontexto($id_encuesta,$titulo,$descripcion,$nom);  





 ?>