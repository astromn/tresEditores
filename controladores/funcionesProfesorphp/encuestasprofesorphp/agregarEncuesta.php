<?php

if (isset($_POST['id_usuario']) && isset($_POST['titulo']) && isset($_POST['descripcion']) && isset($_POST['fecha_final'])) {
    // Incluir archivo de conexión a base de datos
   include ("../../../modelo/funcs/crudencuesta.php");

    // Establecemos la zona horario
    date_default_timezone_set("America/Lima");
  	$date = new DateTime();
  	$fecha_inicio = $date->format('Y-m-d H:i:s');

    // Obtener valores
    $id_usuario  = $_POST['id_usuario'];
    $titulo      = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha_final = $_POST['fecha_final'];



    insertarencuesta($id_usuario,$titulo,$descripcion,$fecha_inicio,$fecha_final);



}
