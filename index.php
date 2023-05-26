<!DOCTYPE html>
<html lang="en">

<head>
  <title>🏡 Home</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
  <link href="css/styles.css" rel="stylesheet" />

  <script src="js/script.js"></script>
</head>

<body>
  <header>
    <!-- place navbar here -->
    <?php
      include('partials/nav.html');
      include('functions/contadores.php');
    ?>
  </header>
  <main>
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
      <div class="text-center">
        <div class="d-flex">
          <div class="card mb-3 custom-card" style="max-width: 540px">
            <div class="row g-0">
              <div class="col-md-4">
                <a href="fabricantes.php" class="image-link">
                  <img src="assets/img/fabrica.png" class="img-fluid rounded-start" />
                </a>
              </div>
              <div class="col-md-8">
                <div class="card-body d-flex flex-column justify-content-center">
                  <h2 class="card-title">Fabricantes</h2>
                  <h1 class="card-text"><?php echo $numFabricantes;?></h1>
                </div>
              </div>
            </div>
          </div>

          <div class="card mb-3 custom-card" style="max-width: 540px">
            <div class="row g-0">
              <div class="col-md-4">
                <a href="productos.php" class="image-link">
                  <img src="assets/img/bot.png" class="img-fluid rounded-start" />
                </a>
              </div>
              <div class="col-md-8">
                <div class="card-body d-flex flex-column justify-content-center">
                  <h2 class="card-title">Productos</h2>
                  <h1 class="card-text"><?php echo $numProductos;?></h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>



  <footer>
    <!-- place footer here -->
  </footer>
  <script>
    includeHTML();
  </script>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
    crossorigin="anonymous"></script>
</body>

</html>