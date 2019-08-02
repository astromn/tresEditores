<?php 

   session_start();
   	include('../../../modelo/funcs/conexion.php');
      include('../../../modelo/funcs/crudrespoder.php');


    $todasopciones=json_decode($_POST['json']);

     // var_dump( $todasopciones -> {"data" }) ;

    $numerop = $_SESSION['numerop'] ;

  
   $resultado=0;
   
    
    $premalas =0;
    $prebuenas=0;    


       foreach ($todasopciones ->{"data"}  as $todasopciones) {
       	
       	 $id []= $todasopciones->{"id"};

       	 $tipop[] =$todasopciones->{"tipo"};

       	 $valor[] =$todasopciones->{"valor"};       	
       }


       for ($i=0; $i <  $numerop ; $i++) { 


       	    $tipopre = $tipop[$i];

       	  

       	if ( $tipopre==1){


       $respuesta="  SELECT tbl_opciones.respuesta from tbl_opciones WHERE tbl_opciones.id_opcion= '$id[$i]'";

         $respuestas = $mysqli->query($respuesta);

         while ($mostarres=mysqli_fetch_array($respuestas)){ 
         $id_orden=$mostarres[0]; 
            } 


            $cadena2 = "Incorrecta";

             if(strcasecmp ($id_orden , $cadena2 )==0){

                $premalas++;

             }else{

             $prebuenas++;
             }
         


       	}else if ( $tipopre==2){


       		  $respuesta="  SELECT tbl_opcionesfv.valor from tbl_opcionesfv WHERE tbl_opcionesfv.id_opcion= '$id[$i]'";

         $respuestas = $mysqli->query($respuesta);

         while ($mostarres=mysqli_fetch_array($respuestas)){ 
         $resfv=$mostarres[0]; 
            } 


            if($resfv== $valor[$i] ){
            $prebuenas++;


            }else {
              $premalas++;


            }
         	}  else if ( $tipopre == 3){


       $respuesta=" SELECT tbl_opcionesimagen.respuesta FROM  tbl_opcionesimagen WHERE tbl_opcionesimagen.id_imagen= '$id[$i]'";

         $respuestas = $mysqli->query($respuesta);

         while ($mostarres=mysqli_fetch_array($respuestas)){ 
         $id_orden=$mostarres[0]; 
            } 


            $cadena2 = "Incorrecta";

             if(strcasecmp ($id_orden , $cadena2 )==0){

                $premalas++;

             }else{

             $prebuenas++;
             }
         


       	}

       
       }


     $id_usuario =  $_SESSION['id_usuario'];

      $id_encuesta  =  $_SESSION['id_encuestas'] ;

/*
       echo "usuario".$id_usuario;
        echo  "encuesta".$id_encuesta;        

       echo "malas --- ".$premalas;
       echo "buenas----".$prebuenas;

*/

   
   if ( $prebuenas!= 0 || $premalas != 0 ){

insertarresultado($premalas, $prebuenas,$id_usuario,$id_encuesta);

   }



    echo $resultado;







 ?>