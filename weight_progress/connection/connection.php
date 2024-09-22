<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'weight_process';

$connection = mysqli_connect($host, $user, $password, $db);

if (!$connection) {
    die('Conexión fallida: ' . mysqli_connect_error());
}
?>