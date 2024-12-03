<?php
session_start();
require_once '../MYSQL/Mysql.php';

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'weight_process';

$mysql = new Mysql($host, $db, $user, $password);

if (isset($_POST['objetivo'])) {
    //Meter en la bd su objetivo
    $mysql->actualizarObjetivo($mysql->getId($_SESSION['user']), $_POST['objetivo']);
    echo $_POST['objetivo'];
    header('location:../index.php');
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../styles/styleVolumenODefi.css">
    </head>

    <body>
        <form action="volumenODefi.php" method="post" class="volumenDefiForm">
            <h1>¿CUAL ES TU OBJETIVO?</h1>

            <select class="form-select" aria-label="Default select example" name="objetivo">
                <option value="Definicion">Perder peso</option>
                <option value="Volumen">Ganar peso</option>
            </select>

            <button type="submit" class="btn btn-primary">Seleccionar</button>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    </body>

    </html>

    <?php
}