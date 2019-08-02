<?php

include("../../../modelo/funcs/conexion.php");

if (isset($_POST)) {
    // Obtener valores
   
    $id_contexto    = $_POST['id_contexto'];
    $titulo         = $_POST['titulo'];
    $descripcion    = $_POST['descripcion'];

    // Modificar producto
    $query = "
        UPDATE tbl_contexto SET
        titulocontexto  = '$titulo',descripcion='$descripcion'
        WHERE id_contexto   = '$id_contexto'
    ";

    if (!$result = mysqli_query($mysqli, $query)) {
        exit(mysqli_error($mysqli));
    }
}