<?php
    //print_r($_POST);

    $nombre_producto = $_POST['nombre_producto'];
    $precio_producto = $_POST['precio_producto'];
    $id_fabricante = $_POST['id_fabricante'];

    include('../connection/connection.php');

    $consulta = "INSERT INTO producto (nombre,precio,id_fabricante_id)
    VALUE ('$nombre_producto', '$precio_producto', '$id_fabricante')";

    $query = mysqli_query($conn,$consulta);

    header('Location: ../productos.php');

?>