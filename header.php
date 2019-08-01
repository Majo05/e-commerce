<?php
include_once("controladores/funciones.php");
require_once("autoload.php");
?>
<header>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css"
  <link rel="stylesheet" href="css/footer_css.css">

  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="home.php"><img src="images/logoDH860-01.png" class="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

          <?php
                //En el if va la variable con la que identificas si estan logueados
              $logueado = validarAcceso();
                if($logueado):?>
              <?php  $usuario = Consulta::buscarPorEmail($_SESSION["email"],'users', $pdo);?>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav nav-contenido ml-auto"><!-- ml-auto genera margen izquierdo HASTA DONDE PUEDA -->
                <li class="nav-item">
                  <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="frecuentes.php">FAQ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Logout.php">Logout</a>
                </li>
                <li class="nav-item">
                   <span class="nav-link">Hola,<?php $usuario["name"] ?></span>
                </li>
                <li class="nav-item">
                  <img  src = <?php $_SESSION["avatar"] ?> >
              <!--    src="https://cdn6.aptoide.com/imgs/f/e/c/fec372f7c957ad5393911379e3a7c2a8_icon.png?w=40"> -->
                </li>
              </ul>
            </div>

          <?php else: ?>

            <!--Aquí iría el menu que quieres mostrar en caso de que no estes logueado-->
            <div class="collapse navbar-collapse" id="navbarNavSL">
              <ul class="navbar-nav nav-contenido ml-auto"><!-- ml-auto genera margen izquierdo HASTA DONDE PUEDA -->
                <li class="nav-item">
                  <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="register.php">Registro</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="frecuentes.php">FAQ</a>
                </li>
              </ul>
            </div>
            <?php endif;?>
  </nav>

</header>
