<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keylagoon - Entrar</title>
</head>

<body>

    <?php

    // Log in / Entrar
    session_start();

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['contrasena'];

        // Recuperar usuario de la BBDD
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = mysqli_query($conector, $sql);

        if (mysqli_num_rows($resultado) == 1) {
            $row = mysqli_fetch_assoc($resultado);
            if (password_verify($password, $row['contraseña'])) {
                $_SESSION['id_usuario'] = $row['id'];
                echo ("Login exitoso");
                header("Location: index.html"); // !!!!!!!!!!!!!!
                exit();
            } else {
                echo ("Contraseña incorrecta");
            }
        } else {
            echo ("Este usuario no existe");
        }
    }

    ?>

</body>

</html>