<?php
include_once("controladores/funciones.php");
require_once("helpers.php");

if($_POST){

dd($_POST["email"]);

  $errores= validarLogin($_POST,"login");
  echo "paso aqui";
  if(count($errores)==0){
    echo "no tiene error";
    $usuario = buscarPorEmail($_POST["email"]);
    echo $usuario;
    if($usuario == null){
      $errores["email"]="Usuario no existe";
    }else{
      if(password_verify($_POST["password"],$usuario["password"])===false){
        $errores["password"]="Error en los datos verifique";
      }else{
        seteoUsuario($usuario,$_POST);
        if(validarAcceso()){
          header("location: headerSesion.php");
          exit;
        }else{
          header("location: register.php");
          exit;
        }
      }
    }
  }
}
?>


<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="css/styles.css">
      <link rel="stylesheet" href="css/login_css.css">
      <link rel="stylesheet" href="css/footer_css.css">
  		<title>DECO HOUSE 860</title>
      <title></title>
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

        		<div class="register-info-box">
        			<h2 class="login-reg">No tienes una cuenta?</h2>
        			<p class="login-reg">Registrate aquí!</p>
        			<input class="login-botonReg" type="button" onclick="window.open('register.php')" value="Registrarse">
        		</div>
            		<div class="white-panel">
            			<div class="login-show">
            				<h2 class="login-title">LOGINnnnnnnnn</h2>
                    <form action="" method="POST" enctype= "multipart/form-data">
              				<input class="login-campos" type="email" id="email" placeholder="email@dominio.com" value="<?= isset($errores["email"])? "": persistir("email") ?>"/>
              				<input class="login-campos" type="password" id="password" placeholder="Password"/>

                      <input name="recordar" type="checkbox" id="recordarme" value="recordar"/>
                      <label class="login-reg">Recuerdarme </label>
                      <br>

                      <button class="login-boton" type="submit">Login</button>
              		<!--		<input class="login-boton" type="button" value="Login"> -->
              				<a class= "login-msj" href="olvidePassword.php">¿Olvidaste tu contraseña?</a>
                    </form>
            			</div>
        		     </div>
        	</div>
    </body>
  </html>
