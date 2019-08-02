<?php

// Incluimos el archivo de conexión a base de datos
include ("../../../modelo/funcs/crudencuesta.php");

// Diseñamos el encabezado de la tabla
$data = '
    <table class="table table-bordered table-hover table-condensed">
        <thead class="thead-dark">
            <tr>
               
                <th>Título</th>
                <th width="100">Descripción</th>
                <th>Estado</th>
                <th>Fecha Inicio</th>
                <th>Fecha Final</th>
                <th>Accciones</th>
            </tr>
        </thead>';
        /*

$query = "SELECT * FROM tbl_encuestas ORDER BY id_encuesta DESC";
$resultado = $mysqli->query($query);
*/

 $resultado=mostrarencuestas();

while ($row = $resultado->fetch_assoc()) {
    $data .= '
        <tbody>
            <tr>
               
                <td><a href="crearcontexto.php?id_encuesta=' . $row['id_encuesta'] . '">' . $row['titulo'] . '</a></td>
                <td width="100">' . mb_strimwidth($row["descripcion"], 0, 30, "...") . '</td>
                <td>' . $row["estado"] . '</td>
                <td>' . $row["fecha_inicio"] . '</td>
                <td>' . $row["fecha_final"] . '</td>
                <td>
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Accciones
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <button onclick="obtenerDetallesEncuesta(' . $row['id_encuesta'] . ')" class="dropdown-item ">Modificar</button>
                        <button onclick="eliminarEncuesta(' . $row['id_encuesta'] . ')" class="dropdown-item ">Eliminar</button>
                        <button onclick="publicarEncuesta(' . $row['id_encuesta'] . ')" class="dropdown-item ">Publicar</button>
                        <button onclick="finalizarEncuesta(' . $row['id_encuesta'] . ')" class="dropdown-item ">Finalizar</button>

                        <a class="dropdown-item btn btn-secondary" href="estudianteresponder.php?id_encuesta=' . $row['id_encuesta'] . '">Vista Previa</a>

                        <a class="dropdown-item btn btn-secondary" href="resultadoprofesor.php?id_encuesta=' . $row['id_encuesta'] . '">Resultados</a>
                    </div>
                </td>
            </tr>
        </tbody>';
}


$data .= '</table>';

echo $data;