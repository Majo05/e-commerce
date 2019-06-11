<?php
require_once("helpers.php");
require_once("controladores/funciones.php");
$usuarioRegistrado = false;
if($_POST){
  $errores = validar($_POST, $_FILES);
  if(count($errores)== 0){
    $avatar = armarAvatar($_FILES);
    $usuario = armarUsuario($_POST, $avatar);
    guardarUsuario($usuario);
    $usuarioRegistrado = true;
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/footer_css.css">
    <title>Registrate</title>
</head>
<body>
    <?php require("header.php"); ?>
    <br><br><br><br>
    <div class="container min-height" >


            <h1>Registro</h1>
<?php if ($usuarioRegistrado) :?>
  <div class="mt-5 pt-5 pb-5 mb-5 text-center fondo-mensaje" role="alert">
    <strong>Felicidades!</strong> Tu cuenta se ha registrado con éxito.
    <br>

    Para comenzar, <a href="login.php">inicia sesión</a>
  </div>
<?php else: ?>
    <form action="" method="POST" enctype= "multipart/form-data">
        <div class="form-group">
            <label for="exampleInputName">Nombre y Apellido</label>

            <input name="nombre" type="text" class="form-control" id="exampleInputName" aria-describedby="NombreyApellido"
            placeholder="Escribe tu nombre y apellido" value="<?= isset($errores["nombre"])? "": persistir("nombre") ?>">
            <small class="form-text text-danger"><?= isset($errores["nombre"])? $errores["nombre"] : "";?></small>
            <small id="NombreyApellido" class="form-text text-muted"></small>

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Correo Electronico</label>
            <input name="email" type="email" value="<?= isset($errores["email"])? "": persistir("email") ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Escribe tu email">
            <small class="form-text text-danger"><?= isset($errores["email"])? $errores["email"] : "";?></small>
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Contraseña</label>
            <input name="password" type="password"  class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
            <small class="form-text text-danger"><?= isset($errores["password"])? $errores["password"] : "";?></small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Contraseña</label>
            <input name="repassword" type="password"  class="form-control" id="exampleInputPassword1" placeholder="Reescriba su contraseña">
            <small class="form-text text-danger"><?= isset($errores["repassword"])? $errores["repassword"] : "";?></small>
        </div>

        <input  type="file" name="avatar" value=""/>
        <small class="form-text text-danger"><?= isset($errores["avatar"])? $errores["avatar"] : "";?></small>
        <br>


            <button type="submit" class="btn btn-primary">Registrar</button>

    </form>
<?php endif; ?>


</div>
<br>
<br>
<br>

<?php require("footer.php"); ?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
