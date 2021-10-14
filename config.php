<?php
define('USER', 'root');
define('PASSWORD', '');
define('HOST', 'localhost');
define('DATABASE', 'database');
try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>
<!--$conectar = mysqli_connect("localhost","root","contraseña que no tiene","base de datos que haya ingresado");-->
<!--Corregir datos y nombres para vincular en la base de datos-->