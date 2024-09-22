<?php
require_once 'logic/logic.php';
require_once './styles/styles_log_in.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form  method="POST">

            <div>
                <h1>
                    REGISTRARSE
                </h1>
            </div>

            <div class="separator">
                <div><label for="email">Email:</label></div>
                <div><input type="email" name="email" id="email" placeholder="Email"></div>
            </div>
            <div class="separator">
                <div><label for="user">Nombre de usuario:</label></div>
                <div> <input type="text" name="user" id="user" placeholder="Nombre de usuario"></div>
            </div>
            <div class="separator">
                <div>
                    <label for="password">Contraseña:</label>
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder="Contraseña">
                </div>
            </div>
            <div class="separator">
                <div>
                    <label for="confirm_password">Confirmar contraseña:</label>
                </div>
                <div>
                    <input type="password" name="confirm_password" id="confirm_password"
                        placeholder="Confirmar contraseña">
                </div>
            </div>

            <div class="buttons">
                <button type="submit" name="register_submit">Crear cuenta</button>
                <button type="button"><a href="login.php">Ya tengo cuenta</a></button>
            </div>

            <div class="register_message">
                <?php
                if (!empty($register_message)) {
                    echo $register_message;
                }
                ?>
            </div>
        </form>
    </div>
</body>

</html>