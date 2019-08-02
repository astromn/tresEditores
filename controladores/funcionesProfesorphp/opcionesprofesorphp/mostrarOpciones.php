<?php

// Incluimos el archivo de conexión a base de datos
include ("../../../modelo/funcs/conexion.php");
include ("../../../modelo/funcs/opcionesphp.php");


include ("../../../modelo/funcs/crudopciones.php");


        session_start();
    $id_pregunta = $_SESSION['id_pregunta'];
       $id_orden = $_SESSION['id_orden'];


   $id_tipo= id_tipo_pregunta($id_pregunta);

  
  while ($mostar=mysqli_fetch_array($id_tipo)){ 
         $tipopre =$mostar[0];
            }




if ( $tipopre== 1) {


   

// Diseñamos el encabezado de la tabla
$data = '
    <table class="table table-bordered table-hover table-condensed">
        <thead class="thead-dark">
            <tr> 
              
                <th>Valor</th>
                <th>Respuesta</th>
                <th>Accciones</th>
            </tr>
        </thead>';



$resultado = mostaropciones($id_orden);

while ($row = $resultado->fetch_assoc()) {
    $data .= '
        <tbody>
            <tr>
             
                <td>' . $row["valor"] . '</td>
                 <td>' . $row["respuesta"] . '</td>
                <td>
                    <button onclick="obtenerDetallesOpcion(' . $row['id_opcion'] . ')" class="btn btn-warning">Modificar</button>
                    <button onclick="eliminarOpcion(' . $row['id_opcion'] . ')" class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
        </tbody>';
}

$data .= '</table>';



echo $data; 

} else if ( $tipopre == 2){

$data = '
    <table class="table table-bordered table-hover table-condensed">
        <thead class="thead-dark">
            <tr> 
                
                <th>Opción</th>
                <th>Accciones</th>
            </tr>
        </thead>';


 
$resultado = mostaropcionesfv($id_orden);


while ($row = $resultado->fetch_assoc()) {
    $data .= '
        <tbody>
            <tr>
                
                <td>' . $row["valor"] . '</td>
                <td>
                    <button onclick="obtenerDetallesOpcion(' . $row['id_opcion'] . ')" class="btn btn-warning">Modificar</button>
                    <button onclick="eliminarOpcion(' . $row['id_opcion'] . ')" class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
        </tbody>';
}

$data .= '</table>';



echo $data; 

}