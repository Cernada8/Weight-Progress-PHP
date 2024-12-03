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
    <link rel="stylesheet" href="./styles/styleRegister.css">
</head>

<body>




    <div class="container">
        <form method="post" action="./Controllers/registerController.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="user">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirmar Contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="confirm_password">
            </div>

            <div class="select-container">
                <label for="objetivo" class="form-label">Objetivo</label>
                <select class="form-select" aria-label="Default select example" id="objetivo" name="objetivo">
                    <option value="Definicion">Perder peso</option>
                    <option value="Volumen">Ganar peso</option>
                </select>
            </div>
            <div class="button-container">
                <button type="submit" class="btn btn-primary">Registrarse</button>
                <button class="btn btn-outline-primary"><a href="login.php">Ya tengo cuenta</a></button>
            </div>




            <div class="register_message">
                <?php
                if (isset($_SESSION['register_message'])) {
                    echo $_SESSION['register_message'];
                }
                $_SESSION['register_message']='';
                ?>
            </div>
        </form>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>

</html>