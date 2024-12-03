<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/styleLogin.css">
</head>

<body>
    <div class="container">
        <form action="./Controllers/loginController.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre de usario</label>
                <input type="text" class="form-control" name="user" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <div class="button-container">
                <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
                <button class="btn btn-outline-primary"><a href="register.php">No tengo cuenta</a></button>
            </div>


            <div class="login_message">
                <?php
                if (isset($_SESSION['login_message'])) {
                    echo $_SESSION['login_message'];
                }
                $_SESSION['login_message']='';
                ?>
            </div>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>

</html>