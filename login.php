<?php
include_once("controladores/funciones.php");
require_once("autoload.php");
//require_once("helpers.php");

if($_POST){

  $errores= validarLogin($_POST);
  if(count($errores)==0){
    echo "no tiene error";
    $usuario = Consulta::buscarPorEmail($_POST["email"],'users', $pdo);
  //  $usuario = buscarPorEmail($_POST["email"]);
  echo $_POST["password"];
    echo "desde login ".$usuario["password"];
    if($usuario == false){
      $errores["email"]="Usuario no existe";
    }else{
    //  if(password_verify($_POST["password"],$usuario["password"])===false){
      if($_POST["password"]!==$usuario["password"]){
        $errores["password"]="Error en los datos verifique";
      }else{
        seteoUsuario($usuario,$_POST);
        if(validarAcceso()){
          header("location: home.php");
          exit;
        }else{
          header("location: register.php");
          exit;
        }
      }
    }
  }
/*


  $usuario = new Usuario($_POST["email"],$_POST["password"]);
      $errores= $validar->validacionLogin($usuario);
      if(count($errores)==0){
        $usuarioEncontrado = BaseMYSQL::buscarPorEmail($usuario->getEmail(),$pdo,'users');
        if($usuarioEncontrado == false){
          $errores["email"]="Usuario no registrado";
        }else{
          if(Autenticador::verificarPassword($usuario->getPassword(),$usuarioEncontrado["password"] )!=true){
            $errores["password"]="Error en los datos verifique";
          }else{
            Autenticador::seteoSesion($usuarioEncontrado);
            if(isset($_POST["recordar"])){
              Autenticador::seteoCookie($usuarioEncontrado);
            }
            if(Autenticador::validarUsuario()){
              redirect("perfil.php");
            }else{
              redirect("registro.php");
            }
          }
        }
      }

*/



}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <link rel="stylesheet" href="css/login_css.css">
  <title>Login</title>
</head>

<body>
  	<?php require("header.php"); ?>

  <!--<div class="container">-->
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
              <h2 class="login-title">LOGIN</h2>
                <form action="" method="POST"   >

                  <input class="login-campos" name="email" type="text" id="email"   value="<?=isset($errores["email"])? "":persistir("email") ;?>" placeholder="Correo electrónico"/>
                  <input class="login-campos" name="password" type="password" id="password"  value="" placeholder="Contraseña..." />

                  <input name="recordar" type="checkbox" id="recordarme" value="recordar"/>
                  <label class = "login-recu">Recuérdarme </label>
                  <a class= "login-msj" href="olvidePassword.php">¿Olvidaste tu contraseña?</a>

                  <button class="login-boton" type="submit">LOGIN</button>
                </form>
        </div>
       </div>

    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </div> -->
  <!--</div>-->
</body>

</html>
