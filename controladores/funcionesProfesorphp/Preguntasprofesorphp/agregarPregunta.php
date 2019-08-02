<?php

if (isset($_POST['id_contexto']) && isset($_POST['titulo']) && isset($_POST['id_tipo_pregunta'])) {
    // Incluir archivo de conexión a base de datos
    include("../../../modelo/funcs/conexion.php");

     include("../../../modelo/funcs/crudpregunta.php");



    session_start();

    // Obtener valores
    $id_contexto = $_POST['id_contexto'];
    $titulo     = $_POST['titulo'];
    $id_tipo_pregunta = $_POST['id_tipo_pregunta'];

    $id_encuesta =  $_SESSION['id_encuesta'];
    $ayuda = $_POST['ayuda'];


    echo $id_contexto;
      echo $titulo;

  echo $id_tipo_pregunta;
  echo $id_encuesta;



  $numc = contarcontextos($id_encuesta);    

  while ($mostar=mysqli_fetch_array($numc)){ 
           $numcc =$mostar[0];
        }    

        if($numcc <= 1 ){

  $nump = contarpreguntas($id_contexto);  

  while ($mostar=mysqli_fetch_array($nump)){ 
           $num =$mostar[0];
        }    

       
    if( $num <= 0){

  
    $resultado = insertarpregunta($id_contexto, $titulo, $ayuda,$id_tipo_pregunta);


    $id_pre = idpreguntainsert($id_contexto);

         while ($mostarr=mysqli_fetch_array($id_pre)){ 
         $id_pregunta=$mostarr[0]; 

            }            

                $ordenp=1;

                insertarorden($ordenp,$id_pregunta);
              
            
            // cuando ingrese mas valores  
      
    } else {

       

  
    $resultado = insertarpregunta($id_contexto, $titulo, $ayuda,$id_tipo_pregunta);
         

         $id_pree = preguntaanterior($id_contexto);

         while ($mostarro=mysqli_fetch_array($id_pree)){ 
         $id_pregunta=$mostarro[0]; 
            }            

          
                          $numero = numeroorden($id_pregunta);                                


                          while (($fila = mysqli_fetch_array($numero))!=NULL){                                   
                                  $numoreden=$fila[0];     
                          }



         $id_pre = idpreguntainsert($id_contexto);


         while ($mostarr=mysqli_fetch_array($id_pre)){ 
         $id_preguntas=$mostarr[0]; 
            } 

                $ordenp=  $numoreden+1;

                insertarorden($ordenp,$id_preguntas);

      
                          

    }      




    /* ---------------------------*/       
        }else {


         $idconant =idultimocontexto($id_encuesta);

         while ($mostarro=mysqli_fetch_array($idconant)){ 
         $contextoan =$mostarro[0]; 
            } 



         $idpregu = ordenidpregunta($contextoan);

         while ($mostarro=mysqli_fetch_array($idpregu)){ 
         $idpregunt =$mostarro[0]; 
            $numeroorden  =$mostarro[1]; 
            } 

          


  $nump = contarpreguntas($id_contexto);     

  while ($mostar=mysqli_fetch_array($nump)){ 
           $num =$mostar[0];
        }    


       
    if( $num <= 0){
    

  
    $resultado = insertarpregunta($id_contexto, $titulo, $ayuda,$id_tipo_pregunta);

 
    $id_pre = idpreguntainsert($id_contexto);

         while ($mostarr=mysqli_fetch_array($id_pre)){ 
         $id_pregunta=$mostarr[0]; 

            }            

                $ordenp=$numeroorden+1 ;

                insertarorden($ordenp,$id_pregunta);             
            
            // cuando ingrese mas valores  
      
    } else {

  
    $resultado = insertarpregunta($id_contexto, $titulo, $ayuda,$id_tipo_pregunta);

        

         $id_pree = preguntaanterior($id_contexto);

         while ($mostarro=mysqli_fetch_array($id_pree)){ 
         $id_pregunta=$mostarro[0]; 
            }            
         

        $numero = numeroorden($id_pregunta);                                


           while (($fila = mysqli_fetch_array($numero))!=NULL){                             
           $numoreden=$fila[0];     
          }



         $id_pre = idpreguntainsert($id_contexto);


         while ($mostarr=mysqli_fetch_array($id_pre)){ 
         $id_preguntas=$mostarr[0]; 
            } 

                $ordenp=  $numoreden+1;


                insertarorden($ordenp,$id_preguntas);

        
                          

    }   

        }
 

}