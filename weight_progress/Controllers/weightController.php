<?php
session_start();
require_once '../MYSQL/Mysql.php';

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'weight_process';

$mysql = new Mysql($host, $db, $user, $password);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $weight = $_POST['weight'];
    if (!isset($_SESSION['user'])) {
        echo 'hola';
        $_SESSION['process_message'] = "<h3 class='red'>Error: Inicia sesion para ingresar un peso.</h3>";
        header('location:../index.php');
        exit();
    } else {

        if ($weight > 0 && is_numeric($weight)) {
            //PROGRESO SEMANAL
            $peso = $mysql->pesoSemanaPasada($_SESSION['user']);
            $objetivo = $mysql->getObjtivo($mysql->getId($_SESSION['user']));
            if (!empty($peso)) {
                $pesoSemanaPasada = $peso[0]['weight'];
                $procesoSemanal = $weight - $pesoSemanaPasada;
                if ($objetivo[0]['tipo_objetivo'] == 'Volumen') {
                    if ($procesoSemanal > 0) {
                        $_SESSION['process_message'] = "<h3 class='green'>Has subido $procesoSemanal kgs esta semana!</h3>";
                    } else if ($procesoSemanal == 0) {
                        $_SESSION['process_message'] = "<h3>Te has mantenido esta semana!</h3>";
                    } else {
                        $_SESSION['process_message'] = "<h3 class='red'>Has bajado " . abs($procesoSemanal) . " kgs esta semana!</h3>";
                    }
                } else {
                    if ($procesoSemanal > 0) {
                        $_SESSION['process_message'] = "<h3 class='red'>Has subido $procesoSemanal kgs esta semana!</h3>";
                    } else if ($procesoSemanal == 0) {
                        $_SESSION['process_message'] = "<h3>Te has mantenido esta semana!</h3>";
                    } else {
                        $_SESSION['process_message'] = "<h3 class='green'>Has bajado " . abs($procesoSemanal) . " kgs esta semana!</h3>";
                    }
                }

                $mysql->insertarPeso($weight);
                header('location:../index.php');
            } else {
                $_SESSION['process_message'] = "<h3 class='green'>Es la primera vez que te pesas {$_SESSION['user']}, sigue asi!!!</h3>";
                $mysql->insertarPeso($weight);
                header('location:../index.php');
            }


        } else {
            $_SESSION['process_message'] = "<h3 class='red'>Introduce un peso valido</h3>";
            header('location:../index.php');
        }

    }
}