<?php

include('connection/connection.php');

function contarFabricantes()
{
    global $conn;
    $consulta = "SELECT COUNT(*) AS total FROM fabricante";
    $resultado = mysqli_query($conn, $consulta);
    $fila = mysqli_fetch_assoc($resultado);
    return $fila['total'];
}

function contarProductos()
{
    global $conn;
    $consulta = "SELECT COUNT(*) AS total FROM producto";
    $resultado = mysqli_query($conn, $consulta);
    $fila = mysqli_fetch_assoc($resultado);
    return $fila['total'];
}

// Ejemplo de uso:
$numFabricantes = contarFabricantes();
$numProductos = contarProductos();

?>
