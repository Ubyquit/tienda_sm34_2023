<?php

//print_r($_POST);

$nombre_fabricante = $_POST['nombre_fabricante'];

include('../connection/connection.php');

$consulta = "INSERT INTO fabricante (nombre) VALUE ('$nombre_fabricante')";

$resultado = mysqli_query($conn, $consulta);

header('Location: ../fabricantes.php');

?>