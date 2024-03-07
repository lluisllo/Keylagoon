<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keylagoon - Registro</title>
</head>

<body>

    <?php

    include 'pdo.php';
    $pdo = new Conexion();

    // Registro
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['contrasena'];
        $repeat_password = $_POST['repetirContrasena'];

        if ($password == $repeat_password) {

            // Censurar contraseña
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insercción en la BBDD
            $sql = $pdo->prepare(
                "INSERT INTO usuarios (email, contraseña) VALUES (?, ?)"
            );

            // Ejecutamos la query 
            $sql->execute([$email, $hashed_password]);

            header("HTTP/1.1 200 OK");
            echo "<b>Usuario registrado con éxito<b>";
            header("Location: ../");
            exit();
        } else {
            echo ("<br>Las contraseñas no coinciden");
            exit();
        }
    } else {
        header("HTTP/1.1 400 Bad Request");
        echo "<br>Error al introducir el boleto<br>";
    }

    ?>

</body>

</html>