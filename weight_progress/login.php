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
        <form action="" method="POST" name="login_form" onsubmit="return validateForm();">
            <div>
                <h1>
                    INICIAR SESION
                </h1>
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


            
                <div class="buttons"> 
                    <button type="submit" name="login_submit">Iniciar sesion</button>
                    <button type="button"><a href="register.php">No tengo cuenta</a></button>
                </div>

            
            <div class="login_message">
                <?php
                if (!empty($login_message)) {
                    echo $login_message;
                }
                ?>
            </div>


        </form>
    </div>
    <script src="logic/jsLogic.js"></script>
</body>

</html>