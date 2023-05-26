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

                    while ($fila = mysqli_fetch_array($resultado)) {
                        ?>
                        <tr>
                            <th scope="row">
                                <?php echo $fila['id_fabricante'] ?>
                            </th>
                            <td>
                                <?php echo $fila['nombre'] ?>
                            </td>
                            <td>

                                <?php 

                                if($fila['contador'] != 0){
                                    echo '<span class="badge text-bg-success">'.$fila['contador'].'</span>';
                                }else{
                                    echo '<span class="badge text-bg-danger">'.$fila['contador'].'</span>';
                                }

                                 ?>

                            </td>
                            <td>
                                <a href="delete/eliminar_fabricante.php?id_fabricante=<?php echo $fila['id_fabricante'] ?>">
                                    <i class="bi bi-trash2-fill text-danger" style="font-size: 1.5rem;"></i>
                                </a>
                            </td>
                            <td>
                                <a href="update/fabricante.php?id_fabricante=<?php echo $fila['id_fabricante'] ?>">
                                    <i class="bi bi-pencil-square text-warning" style="font-size: 1.5rem;"></i>
                                </a>
                            </td>
                        </tr>
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