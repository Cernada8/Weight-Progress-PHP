<?php
session_start();
require_once './MYSQL/Mysql.php';
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'weight_process';

$mysql = new Mysql($host, $db, $user, $password);
if(isset($_SESSION['user'])){
    $objetivo = $mysql->getObjtivo($mysql->getId($_SESSION['user']));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight Process</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/indexStyles.css">
</head>

<body>

    <header>
        <div class="logo_icon">
            <i class="fa-solid fa-circle-user">
                <?php
                if (isset($_SESSION['user'])) {
                    echo $_SESSION['user'];
                } else {
                    echo '  DESCONOCIDO';
                }
                ?></i>
        </div>

        <div class="header-buttons">
            <?php
            if (!isset($_SESSION['user'])) {
                echo '<button type="button" class="btn btn-outline-success"><a href="login.php">Iniciar Sesion</a></button>';
            }
            ?>
            <button type="button" class="btn btn-outline-success"><a href="progreso.php">Ver
            Progreso</a></button>
            <button type="button" class="btn btn-outline-primary"><a href="./Controllers/volumenODefi.php">Cambiar
                    Objetivo</a></button>
            <button type="button" class="btn btn-outline-danger"><a href="./Controllers/logout.php?logout=true">Cerrar
                    Sesion</a></button>

        </div>

    </header>

    <div class="weight-form-container">
        <form action="./Controllers/weightController.php" method="POST">
            <div>
                <h1><?php
                if(isset($objetivo)){
                echo $objetivo[0]['tipo_objetivo'];     
                }
                 ?></h1>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="weight" placeholder="Peso" required>
            </div>

            <button type="submit" name="weight_submit" class="btn btn-outline-success"
                style="color:white">Enviar</button>

            <div class="process_message">
                <?php
                if (!empty($_SESSION['process_message'])) {
                    echo $_SESSION['process_message'];
                }
                $_SESSION['process_message'] = '';
                ?>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>