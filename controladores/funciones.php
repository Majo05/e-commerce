<?php
session_start();
require_once("helpers.php");
function validar($datos,$bandera){

    $errores = [];
   
    if(isset($datos["nombre"])){
        $nombre = trim($datos["nombre"]);
        if(empty($nombre)){
            $errores["nombre"]="El campo no puede estar vacio";
        }
    }
    if(isset($datos["email"])){
        $email = trim($datos["email"]);
        
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
          $errores["email"]="El email no es válido";      
        } else{
            $emailExiste = buscarPorEmail($_POST["email"]);
            if ($emailExiste != null){
                $errores["email"] = "Ese correo ya está registrado.";
            }
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
    
    if(isset($_FILES)){
        
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

function guardarUsuario($usuario){
    $json = json_encode($usuario);
    file_put_contents("usuarios.json",$json.PHP_EOL,FILE_APPEND);
}
function buscarPorEmail($email){
    $usuarios = abrirBaseJSON("usuarios.json");
    
    foreach ($usuarios as $key => $value) {
        
        if($email == $value["email"]){
            return $value;
        }
    }
    return null;
}

function abrirBaseJSON($archivo){
    if(file_exists($archivo)){
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