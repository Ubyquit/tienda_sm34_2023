<?php
//print_r($_GET);
$id_producto = $_GET['id_producto'];
include('../connection/connection.php');
//WHILE
$consulta = "SELECT * FROM fabricante";
$resultado = mysqli_query($conn, $consulta);
//option select
$consulta1 = "SELECT id_producto,producto.nombre, precio,id_fabricante_id, fabricante.nombre
    AS fabricante
    FROM producto
    INNER JOIN fabricante
    ON producto.id_fabricante_id = fabricante.id_fabricante WHERE id_producto = '$id_producto'";
$resultado1 = mysqli_query($conn, $consulta1);
$fabricante = mysqli_fetch_array($resultado1);
?>

<!doctype html>
<html lang="en">

<head>
    <title>Editar producto</title>
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>

        <!-- ========== Start formulario ========== -->
        <form action="actualizar_producto.php" method="post">
            <div class="mb-3">
                <label class="form-label">Producto</label>
                <input name="nombre_producto" value="<?php echo $fabricante['nombre'] ?>" type="text"
                    class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input name="precio_producto" value="<?php echo $fabricante['precio'] ?>" type="number"  class="form-control" min="0" max="9999" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Fabricante</label>
                <select name="id_fabricante" class="form-select">
                    <option value="<?php echo $fabricante['id_fabricante_id']; ?>" selected><?php echo $fabricante['fabricante'] ?></option>
                    <?php
                    while ($fila = mysqli_fetch_array($resultado)) {
                        ?>
                        <option value="<?php echo $fila['id_fabricante']; ?>"><?php echo $fila['nombre']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <input name="id_producto" value="<?php echo $id_producto; ?>" type="hidden">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <!-- ========== End formulario ========== -->



    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
</body>

</html>