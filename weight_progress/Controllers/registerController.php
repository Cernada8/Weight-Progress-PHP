<?php
session_start();
require_once '../MYSQL/Mysql.php';

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'weight_process';

$mysql = new Mysql($host, $db, $user, $password);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_email = $_POST['email'];
    $register_user_name = $_POST['user'];
    $register_user_password = $_POST['password'];
    $register_user_confirm_password = $_POST['confirm_password'];

    if (strlen(trim($register_user_password)) < 8) {
        $_SESSION['register_message'] = "<h3 class='red'>Contraseña mínima 8 caractéres.</h3>";
        header('location:../register.php');
    } else {
        if ($register_user_password !== $register_user_confirm_password) {
            $_SESSION['register_message'] = "<h3 class='red'>Las contraseñas no coinciden.</h3>";
            header( 'location:../register.php');
        } else {
            $existe=$mysql->usuarioExiste($register_user_name);
            if ($existe) {
                $_SESSION['register_message'] = "<h3 class='red'> El usuario ya existe.</h3>";
                header( 'location:../register.php');
            } else {
                $mysql->insertarUsuario($register_user_name, $register_user_password);
                $id=$mysql->getId($register_user_name)[0]['id'];
                $mysql->insertarObjetivo($id,$_POST['objetivo']);
                //TODO: insertar el objetivo
                
                header( 'location:../login.php');
            }
        }

    }
}
