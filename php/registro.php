<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keylagoon - Registro</title>
</head>

<body>

    <?php

    // Registro
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['contrasena'];
        $repeat_password = $_POST['repetirContrasena'];

        // Censurar contraseña
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insercción en la BBDD
        $sql = "INSERT INTO usuarios (email, contraseña) VALUES (
                            '$email', '$hashed_password'
                        )";


        if ($password == $repeat_password) {


            if (mysqli_query($conector, $sql)) {
                echo ("Registro exitoso");
            } else {
                echo ("Error: " . $sql . "<br>" . mysqli_error($conector));
            }
        } else {
            echo ("<br>Las contraseñas no coinciden");
            exit();
        }
    }

    ?>

</body>

</html>