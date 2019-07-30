<?php
//MSc. Angel Daniel Fuentes Segura
//Hernan Facundo
//Este pequeño sistema se lo creamos para que vean como incorporar PHP -PDO en sus proyectos integradores
require_once('clases/baseMYSQL.php');
require_once('clases/consulta.php');
require_once('clases/producto.php');
require_once('clases/faq.php');
require_once('clases/usuario.php');
require_once('controladores/funciones.php');


//Declaramoslas  variables - Les recuerdoamos que esto lo pueden hacer ustedes de diversas formas
$host = "127.0.0.1";
$bd = "e-commerce";
$usuario = "root";
$password = "";
$puerto = "3307";
$charset = "utf8mb4";
//Ojo: Para los que trabajan con MAC: deben colocar el puerto: 8889

$pdo = BaseMYSQL::conexion($host,$bd,$usuario,$password,$puerto,$charset);
