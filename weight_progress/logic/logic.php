<?php
session_start();

require_once './connection/connection.php';
$red = "red";
$green = "green";
$login_message = '';
$user_name = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //FORMULARIO PARA EL LOGIN
    if (isset($_POST['login_submit'])) {
        //Funcion para evitar inyecciones
        $user_name = mysqli_real_escape_string($connection, $_POST['user']);
        $user_password = mysqli_real_escape_string($connection, $_POST['password']);

        $query =
            "SELECT id FROM user 
    WHERE name = '$user_name' 
    AND 
    user_pass = '$user_password'";


        $result = mysqli_query($connection, $query);


        if (mysqli_num_rows($result) > 0) {
            $_SESSION['user'] = $user_name;
            header("location:index.php");
            exit();
        } else {
            $login_message = "<h3 class=$red>Nombre o contraseña incorrectos.</h3>";
        }
        // Cierre de la conexión
        mysqli_close($connection);
    }


    //FORMULARIO DE REGISTRO
    if (isset($_POST['register_submit'])) {
        $user_email = mysqli_real_escape_string($connection, $_POST['email']);
        $register_user_name = mysqli_real_escape_string($connection, $_POST['user']);
        $register_user_password = mysqli_real_escape_string($connection, $_POST['password']);
        $register_user_confirm_password = mysqli_real_escape_string($connection, $_POST['confirm_password']);
        $register_message = '';

        if (strlen(trim($register_user_password)) < 8) {
            $register_message = "<h3 class=$red>Contraseña mínima 8 caractéres.</h3>";
        } else {
            if ($register_user_password !== $register_user_confirm_password) {
                $register_message = "<h3 class=$red>Las contraseñas no coinciden.</h3>";
            } else {
                $query_user_exists =
                    "SELECT name FROM user
                WHERE name='$register_user_name' 
                ";

                $result_user_exists = mysqli_query($connection, $query_user_exists);
                if (mysqli_num_rows($result_user_exists) !== 0) {
                    $register_message = "<h3 class=$red> El usuario ya existe.</h3>";
                } else {
                    $query =
                        "INSERT INTO user
                    (name, user_pass)
                    values('$register_user_name', '$register_user_password')
                    ";

                    $result = mysqli_query($connection, $query);
                    if ($result) {
                        $_SESSION['user'] = $user_name;
                        header("location:index.php");
                        exit();
                    } else {
                        echo 'error.';
                    }
                }
            }
            mysqli_close($connection);
        }
    }


    //FORMULARIO DEL LOGOUT
    if (isset($_POST['logout_submit'])) {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);

            session_destroy();
        }
    }


    $message = '';



    $process_message = '';

    $total_process_message = '';

    $last_week_weigth = null;
    $first_weight = null;
    //FORMULARIO PARA ENVIAR EL PESO
    if (isset($_POST['weight_submit'])) {

        // Función para evitar inyecciones SQL
        $weight = mysqli_real_escape_string($connection, $_POST['weight']);

        // Validación del peso
        if (!isset($user_name)) {
            $message = "<h3 class=$red>Error: Inicia sesion para ingresar un peso.</h3>";
            exit();
        } else {
            $user_name = $_SESSION['user'];

            if (is_numeric($weight) && $weight > 0) {

                //Averiguamos el peso de la ultima semana
                $query_last_week =
                    "SELECT weight 
            FROM weight 
            WHERE (id = (SELECT MAX(id) FROM weight))
            AND
            (user_name = '$user_name')";

                $result_last_week = mysqli_query($connection, $query_last_week);

                if (!mysqli_num_rows($result_last_week) == null) {
                    $process_message = "";
                    if ($result_last_week) {
                        $row_last_week = mysqli_fetch_assoc($result_last_week);
                        $last_week_weigth = $row_last_week["weight"];
                    }
                }

                $query_total_process =
                    "SELECT * 
            FROM weight
            WHERE id=
            (SELECT min(id) FROM weight
            WHERE user_name='$user_name')";

                $result_total_process = mysqli_query($connection, $query_total_process);

                if (!mysqli_num_rows($result_total_process) == null) {
                    $row_total_process = mysqli_fetch_assoc($result_total_process);
                    $first_weight = $row_total_process["weight"];
                    $first_date = $row_total_process["date_weighted"];
                }


                // Consulta
                $query = "INSERT INTO weight (weight, user_name) VALUES ('$weight', '$user_name')";

                // Ejecución de la consulta
                if (mysqli_query($connection, $query)) {

                    if ($last_week_weigth !== null) {
                        $process_made = $weight - $last_week_weigth;

                        $process_message = match (true) {
                            $process_made > 0 => "<h3 class=$green>Has subido $process_made kgs esta semana!</h3>",
                            $process_made < 0 => "<h3 class=$red>Has bajado " . abs($process_made) . " kgs esta semana :(</h3>",
                            default => "<h3 class=$green>Pesas lo mismo esta semana :)</h3>"
                        };

                    }

                    if ($first_weight !== null) {
                        $total_process_made = $weight - $first_weight;
                        $total_process_message = match (true) {
                            $total_process_made > 0 => "<h2 class=$green> Has subido $total_process_made kgs desde el $first_date.</h2>",
                            $total_process_made < 0 => "<h2 class=$red> Has bajado " . abs($total_process_made) . " kgs desde el $first_date.</h2>",
                            default => "<h2 class=$green> Estas igual desde el $first_date.</h2>"
                        };


                    }

                } else {
                    $message = "<h3 class=$red>Error: no se pudo registrar el peso.</h3>";
                }
            } else {
                $message = "<h3 class=$red>Error: Ingresa un peso válido.</h3>";
            }

            // Cierre de la conexión
            mysqli_close($connection);
        }

    }


}





?>