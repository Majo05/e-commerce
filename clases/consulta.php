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
        
        $stmt = $base->prepare("INSERT INTO productos (name, type, price, stock) VALUES (:name, :type, :price, :stock)");

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':type', $type, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_INT);
        $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
    

        $stmt->execute();
    }
}