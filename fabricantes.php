<!doctype html>
<html lang="en">

<head>
    <title>🏭 Fabricantes</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <header>
        <!-- place navbar here -->
        <?php include('partials/nav.html') ?>
    </header>
    <br>
    <main class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- ========== Start FORM ========== -->
                <form action="insert/registro_fabricantes.php" method="post">
                    <div class="mb-3">
                        <label for="input_fabricante" class="form-label">Nombre fabricante</label>
                        <input name="nombre_fabricante" type="text" class="form-control" id="input_fabricante">
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
                <!-- ========== End FORM ========== -->
            </div>
            <div class="col-md-8">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre fabricante</th>
                            <th scope="col">Productos</th>
                            <th scope="col">Eliminar</th>
                            <th scope="col">Actualizar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('connection/connection.php');

                        $consulta = "CALL p_verFabricantes()";
                        $resultado = mysqli_query($conn, $consulta);

                        while ($fila = mysqli_fetch_array($resultado)) { ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $fila['id_fabricante'] ?>
                                </th>
                                <td>
                                    <?php echo $fila['nombre'] ?>
                                </td>
                                <td>
                                    <?php
                                    if ($fila['contador'] != 0) {
                                        echo '<a href="#" data-bs-toggle="modal" data-bs-target="#productosModal' . $fila['id_fabricante'] . '"><span class="badge rounded-pill text-bg-success">' . $fila['contador'] . '</span></a>';
                                    } else {
                                        echo '<span class="badge rounded-pill text-bg-danger">' . $fila['contador'] . '</span>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a
                                        href="delete/eliminar_fabricante.php?id_fabricante=<?php echo $fila['id_fabricante'] ?>">
                                        <i class="bi bi-trash2-fill text-danger" style="font-size: 1.5rem;"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="update/fabricante.php?id_fabricante=<?php echo $fila['id_fabricante'] ?>">
                                        <i class="bi bi-arrow-clockwise text-warning" style="font-size: 1.5rem;"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- Modal de productos -->
                            <div class="modal fade" id="productosModal<?php echo $fila['id_fabricante'] ?>" tabindex="-1"
                                aria-labelledby="productosModalLabel<?php echo $fila['id_fabricante'] ?>"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="productosModalLabel<?php echo $fila['id_fabricante'] ?>">Productos del
                                                fabricante <?php echo $fila['nombre'] ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Aquí puedes mostrar la lista de productos del fabricante -->
                                            <!-- Ejemplo: -->
                                            <ul>
                                                <?php
                                                include('connection/connection.php');

                                                $consulta3 = "SELECT*FROM producto WHERE id_fabricante_id ='$fila[id_fabricante]'";
                                                $resultado3 = mysqli_query($conn, $consulta3);

                                                while ($fila3 = mysqli_fetch_array($resultado3)) { ?>
                                                    <li><?php echo $fila3['nombre'] ?></li>
                                                <?php } ?>
                                                <!-- ... -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
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