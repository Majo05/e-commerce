<?php
session_start();
require_once("helpers.php");
function validar($datos, $bandera){

    $errores = [];

    if(isset($datos["nombre"])){
        $nombre = trim($datos["nombre"]);
        if(empty($nombre)){
            $errores["nombre"]="El campo no puede estar vacio";
        }
    }
    if(isset($datos["apellido"])){
        $apellido = trim($datos["apellido"]);
        if(empty($apellido)){
            $errores["apellido"]="El campo no puede estar vacio";
        }
    }
    if(isset($datos["email"])){
        $email = trim($datos["email"]);

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
          $errores["email"]="El email no es válido";
        }
        /*else{
            $emailExiste = buscarPorEmail($_POST["email"]);
            if ($emailExiste != null){
                $errores["email"] = "Ese correo ya está registrado.";
            }
        }
*/

        }

        if(isset($datos["doctype_id"])){
            if($datos["doctype_id"] == NULL){
                $errores["doctype_id"]="Por favor elija una opción";
        }
    }

    if(isset($datos["nroDoc"])){
        $nroDoc = trim($datos["nroDoc"]);
        if(empty($nroDoc)){
            $errores["nroDoc"]="El campo no puede estar vacio";
        }
    }

    if(isset($datos["phone"])){
        $phone = trim($datos["phone"]);
        if(empty($phone)){
            $errores["phone"]="El campo no puede estar vacio";
        }
    }

    if(isset($datos["address"])){
        $address = trim($datos["address"]);
        if(empty($address)){
            $errores["address"]="El campo no puede estar vacio";
        }
    }

    $password = trim($datos["password"]);
    if(isset($datos["password"])){
        if(empty($password)){
            $errores["password"] = "El campo no puede estar vacio";
        }elseif(strlen($password)<6){
            $errores["password"]="El password debe tener mínimo 6 cacteres";
        }
    }
    if(isset($datos["repassword"])){
        $repassword = trim($datos["repassword"]);
        if(empty($repassword)){
            $errores["repassword"]= "El campo no debe estar vacio";
        }
        if($password != $repassword){
            $errores["repassword"]= "Las contraseñas deben coincidir";
        }
    }

    if(isset($_FILES) && $_FILES["avatar"]["error"]!=4){

        $avatar = $_FILES["avatar"]["name"];
        $ext = pathinfo($avatar,PATHINFO_EXTENSION);
        if($_FILES["avatar"]["error"]!=0){
            $errores["avatar"]="No recibi la imagen";
        }else if($ext != "jpg" && $ext != "jpeg" && $ext != "png"){
            $errores["avatar"] = "La extensión debe ser PNG, JPEG ó JPG";
        }

    }
    return $errores;

}

function validarLogin($datos){

    $errores = [];
//  if($bandera == "login"){
    if(isset($datos["email"])){
    $email = trim($datos["email"]);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $errores["email"]="El email no es válido";
      }
    }
    $password = trim($datos["password"]);
    if(isset($datos["password"])){
        if(empty($password)){
            $errores["password"] = "El campo no puede estar vacio";
        }
      }
  //  }
  return $errores;
}

function armarAvatar($imagen){
    $nombre = $imagen["avatar"]["name"];
    $ext = pathinfo($nombre,PATHINFO_EXTENSION);
    $archivoOrigen = $imagen["avatar"]["tmp_name"];
    $archivoDestino = dirname(__DIR__);
    $archivoDestino = $archivoDestino."../avatarUsuarios/";
    $avatar = uniqid();
    $archivoDestino = $archivoDestino.$avatar;
    $archivoDestino = $archivoDestino.".".$ext;
    move_uploaded_file($archivoOrigen,$archivoDestino);
    $avatar = $avatar.".".$ext;
    return $avatar;
}

function armarUsuario($datos,$avatar){
    $usuario = [
        "nombre"=>$datos["nombre"],
        "email"=>$datos["email"],
        "password"=>password_hash($datos["password"],PASSWORD_DEFAULT),
        "avatar"=>$avatar,
        "perfil"=>1
    ];
    return $usuario;
}


/*
function buscarPorEmail($email){
    $usuarios = abrirBaseJSON("usuarios.json");

    foreach ($usuarios as $key => $value) {

        if($email == $value["email"]){
            return $value;
        }
    }
    return null;
}*/

function abrirBaseJSON($archivo){
    if(file_exists($archivo)){
        $arrayUsuarios = [];
        $json = file_get_contents($archivo);
        $json = explode(PHP_EOL,$json);
        array_pop($json);
        foreach ($json as $key => $value) {
            $arrayUsuarios[]=json_decode($value,true);
        }
        return $arrayUsuarios;
    }
    return null;
}

function seteoUsuario($usuario,$datos){

    $_SESSION["nombre"] = $usuario["nombre"];
    $_SESSION["email"]=$usuario["email"];
    $_SESSION["avatar"]=$usuario["avatar"];
    $_SESSION["perfil"]=$usuario["perfil"];
    if(isset($datos["recordar"])){
        setcookie("email",$datos["email"],time()+3600);
        setcookie("password",$datos["password"],time()+3600);
    }

}

function validarAcceso(){
    if(isset($_SESSION["email"])){
        return true;
    }elseif (isset($_COOKIE["email"])) {
        $_SESSION["email"]= $_COOKIE["email"];
        $_SESSION["password"]=$_COOKIE["password"];
        return true;
    }else{
        return false;
    }
}

function armarRegistroOlvide($datos){
    $usuarios = abrirBaseJSON("usuarios.json");

    foreach ($usuarios as $key=>$usuario) {

        if($datos["email"]==$usuario["email"]){
            //Esta línea se las comente para que a futuro puedan probar si la clave nueva la van a grabar coorectamente, la idea es verla antes de hashearla.
            //$usuario["password"]= $datos["password"];
            $usuario["password"]= password_hash($datos["password"],PASSWORD_DEFAULT);
            $usuarios[$key] = $usuario;
        }
        $usuarios[$key] = $usuario;
    }
  }
