<?php
// Validar consulta
if (isset($_POST['id_pregunta']) && isset($_POST['id_pregunta']) != "") {
    // Incluir archivo de conexión a base de datos
    include("../../../modelo/funcs/conexion.php");

    // Obtener id_pregunta
    $id_pregunta = $_POST['id_pregunta'];

    // Eliminar encuesta
    $query = "DELETE FROM tbl_preguntas WHERE id_pregunta = '$id_pregunta'";
    $resultado = $mysqli->query($query);
}
