<?php
    print_r($_GET);

    $id_producto = $_GET['id_producto'];

    include('../connection/connection.php');

    $consulta = "DELETE FROM producto
    WHERE id_producto = '$id_producto'";

    $query = mysqli_query($conn,$consulta);

    header('Location: ../productos.php');
?>