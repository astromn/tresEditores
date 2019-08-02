<?php 



include ("../../../modelo/funcs/crudcontexto.php");

  session_start();

  $id_encuesta= $_SESSION['id_encuesta']  ;


$data = '
    <table class="table table-bordered table-hover table-condensed">
        <thead class="thead-dark">
            <tr>              
             
                <th>Título</th>
                <th>Contexto</th>
                <th>imagen</th>

                <th>Accciones</th>
            </tr>
        </thead>';


$resultado =  mostarrcontexto($id_encuesta);

while ($row = $resultado->fetch_assoc()) {
    $data .= '
        <tbody>
            <tr>
               
             
                <td><a href="CrearPregunta.php?id_contexto=' . $row['id_contexto'] . '">' . $row['titulocontexto'] . '</a></td>
                <td>' . $row["descripcion"] . '</td>
                 <td>  <img src="../controladores/funcionesProfesorphp/contextoprofesorphp/imagenesf/'.$row["imagen"].'"  width="50" height="50"> </td>

                 

                    
                <td>
                    <button onclick="obtenerDetallescontexto(' . $row['id_contexto'] . ')" class="btn btn-warning">Modificar</button>
                    <button onclick="eliminarcontexto(' . $row['id_contexto'] . ')" class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
        </tbody>';
}

$data .= '</table>';

echo $data; 










 ?>