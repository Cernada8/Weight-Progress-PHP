<?php
require_once 'logic/logic.php';
require_once './styles/styles.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight Process</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <header>
        <div class="logo_icon">
            <i class="fa-solid fa-circle-user"> <?php
            if (isset($_SESSION['user'])) {
                echo $_SESSION['user'];
            } else {
                echo '  desconocido';
            }

            ?></i>
        </div>

        <div>
            <form method="POST" id="header_form">
                <button><a href="login.php">INICIAR SESION</a></button>
                <button><a href="register.php">REGISTRARSE</a></button>
                <button type="submit" name="logout_submit">CERRAR SESION</button>
            </form>
        </div>

    </header>

    <div class="formContainer">
        <form action="" method="POST" name="main_form">
            <div>
                <h1>VOLUMEN</h1>
            </div>

            <div class="input">
                <input type="text" name="weight" placeholder="Peso">
            </div>
            <div class="button">
                <button type="submit" name="weight_submit">
                    Enviar
                </button>
            </div>


            <div id="message">
                <?php
                if (!empty($message)) {
                    echo $message;
                }
                ?>
            </div>

            <div class="process_message">
                <?php
                if (!empty($process_message)) {
                    echo $process_message;
                }
                ?>
            </div>

            <div>
                <?php
                if (!empty($total_process_message)) {
                    echo $total_process_message;
                }
                ?>
            </div>
        </form>
    </div>

</body>

</html>