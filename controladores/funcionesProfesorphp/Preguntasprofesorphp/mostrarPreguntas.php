<?php

// Incluimos el archivo de conexión a base de datos
include ("../../../modelo/funcs/conexion.php");

  session_start();

  $id_contexto= $_SESSION['id_contexto'];

// Diseñamos el encabezado de la tabla
$data = '
    <table class="table table-bordered table-hover table-condensed">
        <thead class="thead-dark">
            <tr>
              
                <th>Numero Pregunta </th>
                <th>Título</th>
                 <th>Ayuda</th>
                <th>Tipo</th>
                <th>Accciones</th>
            </tr>
        </thead>';

$query = "SELECT p.id_pregunta,o.numero_orden , p.titulo, p.ayudaestudiante,tipo_pregunta.nombre ,p.id_tipo_pregunta FROM tbl_preguntas p INNER JOIN tipo_pregunta ON (p.id_tipo_pregunta = tipo_pregunta.id_tipo_pregunta) INNER JOIN tbl_orden o on(o.id_pregunta=p.id_pregunta) WHERE p.id_contexto = '$id_contexto'  ORDER BY o.numero_orden ";

$resultado = $mysqli->query($query);

while ($row = $resultado->fetch_assoc()) {
    $data .= '
        <tbody>
            <tr>
               
                 <td>' . $row["numero_orden"] . '</td>';



        if ( $row["id_tipo_pregunta"]==3 ){

            $data .= '  <td><a href="CrearOpcionesimagen.php?id_pregunta=' . $row['id_pregunta'] . '">' . $row['titulo'] . '</a></td>';

                    }else {


               $data .= '  <td><a href="CrearOpciones.php?id_pregunta=' . $row['id_pregunta'] . '">' . $row['titulo'] . '</a></td>';

                        }                    

           $data.= '  


            <td>' . $row["ayudaestudiante"] . '</td>'; 



   $data.= ' 
                 

                <td>' . $row["nombre"] . '</td>
                <td>
                    <button onclick="obtenerDetallesPregunta(' . $row['id_pregunta'] . ')" class="btn btn-warning">Modificar</button>
                    <button onclick="eliminarPregunta(' . $row['id_pregunta'] . ')" class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
        </tbody>';
}

$data .= '</table>';

echo $data; 