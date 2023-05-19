<?php
//print_r($_POST);

$nombre_producto = $_POST['nombre_producto'];
$precio_producto = $_POST['precio_producto'];
$id_fabricante = $_POST['id_fabricante'];
$id_producto = $_POST['id_producto'];

include('../connection/connection.php');

$consulta = "UPDATE producto 
    SET nombre = '$nombre_producto', precio = '$precio_producto', id_fabricante_id = '$id_fabricante'
    WHERE id_producto = '$id_producto'";

$query = mysqli_query($conn,$consulta);

header('Location: ../productos.php');
?>