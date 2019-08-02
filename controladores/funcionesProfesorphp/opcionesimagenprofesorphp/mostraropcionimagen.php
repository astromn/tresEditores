<?php 


// Incluimos el archivo de conexión a base de datos
include ("../../../modelo/funcs/conexion.php");
include ("../../../modelo/funcs/opcionesphp.php");

include ("../../../modelo/funcs/crudopciones.php");


        session_start();
    $id_pregunta = $_SESSION['id_pregunta'];
       $id_orden = $_SESSION['id_orden'];
   

   

// Diseñamos el encabezado de la tabla
$data = '
    <table class="table table-bordered table-hover table-condensed">
        <thead class="thead-dark">
            <tr> 
              
                <th>imagen</th>
                  <th>Respuesta</th>
                <th>Accciones</th>
            </tr>
        </thead>';


$resultado = mostaropcionimagen($id_orden);

while ($row = $resultado->fetch_assoc()) {
    $data .= '
        <tbody>
            <tr>
             


           

                <td>  <img src="../controladores/funcionesProfesorphp/opcionesimagenprofesorphp/imagenesopcion/'.$row["imagen"].'"  width="50" height="50"> </td>

                  <td> '. $row["respuesta"] . ' </td>





                <td>
                    <button onclick="obtenerDetallesOpcion(' . $row['id_imagen'] . ')" class="btn btn-warning">Modificar</button>
                    <button onclick="eliminarOpcion(' . $row['id_imagen'] . ')" class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
        </tbody>';
}

$data .= '</table>';



echo $data; 


 ?>