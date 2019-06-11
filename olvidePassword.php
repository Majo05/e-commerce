<?php
include_once("controladores/funciones.php");
require_once("helpers.php");
$cambioExitoso = false;
if($_POST){
  $errores= validarLogin($_POST);
  if(count($errores)==0){
    $usuario = buscarPorEmail($_POST["email"]);
    if($usuario == null){
      $errores["email"]="Usuario no existe en nuestra base de datos";
    }else{
        $registro = armarRegistroOlvide($_POST);
          $cambioExitoso = true;
          //exit;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <link rel="stylesheet" href="css/login_css.css">
  <title>Recuperar Contraseña</title>
</head>

<body>

  <?php require("header.php"); ?>

    <?php
      if(isset($errores)):?>
        <ul class="alert alert-danger">
          <?php
          foreach ($errores as $key => $value) :?>
            <li> <?=$value;?> </li>
            <?php endforeach;?>
        </ul>
      <?php endif;?>

        <div class="login-reg-panel">
          <div class="white-panel">
            <div class="login-show">
              <h2 class="login-title">Recuperar Contraseña</h2>

              <?php if($cambioExitoso) :?>
                <div class="mt-5 pt-5 pb-5 mb-5 text-center fondo-mensaje" role="alert">
                  Su contraseña fue modificada satisfactoriamente.
                  <br>
                  Para comenzar, <a href="login.php">inicia sesión</a>
                </div>
              <?php else: ?>

                <form action="" method="POST" enctype= "multipart/form-data"  >

                  <input class="login-campos" name="email" type="email" id="email" value="<?=isset($errores["email"])? "":persistir("email") ;?>" placeholder="Correo electrónico"/>
                  <br>

                  <input class="login-campos" name="password" type="password" id="password" value="" placeholder="Nueva Contraseña" />
                  <br>

                  <input class="login-campos" name="repassword" type="password" id="repassword" value="" placeholder="Confirmar nueva contraseña" />
                  <br>
                  <button class="login-boton" type="submit">Confirmar</button>
                </form>
              <?php endif; ?>
          </div>
        </div>
  </div>
</body>

</html>
