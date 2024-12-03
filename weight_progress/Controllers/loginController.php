<?php
session_start();
require_once '../MYSQL/Mysql.php';

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'weight_process';

$mysql = new Mysql($host, $db, $user, $password);

//FORMULARIO PARA EL LOGIN
if (isset($_POST['user'])) {

    //Funcion para evitar inyecciones
    $user_name = $_POST['user'];
    $user_password = $_POST['password'];
    $login = $mysql->login($user_name, $user_password);

    if ($login == true) {
        $_SESSION['user'] = $user_name;
        header("location:../index.php");
        exit();
    } else {
        $_SESSION['login_message'] = "<h3 class='red'>Nombre o contraseña incorrectos.</h3>";
        header('location:../login.php');
        exit();
    }
}