<?php

class Consulta{

    public static function listar($tabla, $base)
    {
        $sql = "SELECT * FROM $tabla";
        $query = $base->prepare($sql);
        $query->execute();

        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;
    }

    public static function insertarProducto($producto, $base){
        $name = $producto->getName();
        $type = $producto->getType();
        $price = $producto->getPrice();
        $stock = $producto->getStock();

        $stmt = $base->prepare("INSERT INTO productos(name, type, price, stock) VALUES (:name, :type, :price, :stock)");

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':type', $type, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_INT);
        $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);


        $stmt->execute();
    }

public static function guardarUsuario($usuario, $base){
    $name = $usuario->getName();
    $lastname = $usuario->getLastname();
    $email  = $usuario->getEmail();
    $password = $usuario->getPassword();
    $avatar = $usuario->getAvatar();
    $type = $usuario->getType();
    $nroDoc = $usuario->getNroDoc();
    $phone = $usuario->getPhone();
    $address = $usuario->getAddress();
    $role_id = $usuario->getRole_id();

    $stmt = $base->prepare("INSERT INTO users(name, lastname, email, password, avatar, type, nroDoc, phone, address, role_id) VALUES (:name, :lastname, :email, :password, :avatar, :type, :nroDoc, :phone, :address, :role_id)");

    var_dump($stmt);
    exit;

    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_INT);
    $stmt->bindParam(':password', $password, PDO::PARAM_INT);
    $stmt->bindParam(':avatar', $avatar, PDO::PARAM_STR);
    $stmt->bindParam(':type', $type, PDO::PARAM_STR);
    $stmt->bindParam(':nroDoc', $nroDoc, PDO::PARAM_INT);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_INT);
    $stmt->bindParam(':address', $address, PDO::PARAM_STR);
    $stmt->bindParam(':role_id', $role_id, PDO::PARAM_INT);
    $stmt->execute();
}

public static function armarAvatar($imagen){
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

}
