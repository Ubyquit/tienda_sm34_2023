<?php
    //print_r($_GET);

    $id_fabricante = $_GET['id_fabricante'];

    include('../connection/connection.php');

    $consulta = "DELETE FROM fabricante WHERE id_fabricante = '$id_fabricante'";

    $resultado = mysqli_query($conn, $consulta);

    header('Location: ../fabricantes.php');

?>