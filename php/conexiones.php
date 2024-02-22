<?php

// Credenciales locales
$host = "localhost";
$user = "edib";
$password = "edib";
$bbdd = "Keylagoon";
$conector = mysqli_connect($host, $user, $password);

// Credenciales
// $host = "bbdd.lluisllodraedib.com";
// $user = "ddb219298";
// $password = "7894561Ll";
// $bbdd = "ddb219298";
// $port = 3306;
// $conector = mysqli_connect($host, $user, $password, $port);

if ($conector) {
    echo "Conectado a mysql con el usuario: <b>" . $user . "</b>";
    echo "<br>Se ha conectado a la BBDD <b>" . $bbdd . "</b>";

    // Registro
    if (isset($_POST['register'])) {
        $email = $_POST['email'];
        $password = $_POST['contrasena'];
        $repeat_password = $_POST['repetirContrasena'];

        if ($password == $repeat_password) {
            // Censurar contraseña
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insercción en la BBDD
            $sql = "INSERT INTO usuarios (email, contraseña) VALUES (
                '$email','$hashed_password'
            )";

            if (mysqli_query($conector, $sql)) {
                echo ("Registro exitoso");
            } else {
                echo ("Error: " . $sql . "<br>" . mysqli_error($conector));
            }
        } else {
            echo ("Las contraseñas no coinciden");
            exit();
        }
    }

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
                header("Location: index.php"); // !!!!!!!!!!!!!!
                exit();
            } else {
                echo ("Contraseña incorrecta");
            }
        } else {
            echo ("Este usuario no existe");
        }
    }

    // Guardar contraseña
    session_start();

    if (!isset($_SESSION['id_usuario'])) {
        header("Location: index.php");
        exit();
    }

    if (isset($_POST['guardar_contrasena'])) {
        $password = $_POST['contrasena'];
        $date = $_POST['fecha'];
        $motive = $_POST['motivo'];
        $comment = $_POST['comentario'];
        $id_usuario = $SESSION['id_usuario'];

        // Insertar en la BBDD
        $sql = "INSERT INTO contraseñas (
            id_usuario, contraseña, fecha, motivo, comentario 
        ) VALUES (
            '$id_usuario', '$password', '$date', '$motive', '$comment'
        )";

        if (mysqli_query($conector, $sql)) {
            echo "Contraseña guardada correctamente";
        } else {
            echo ("Error: " . $sql . "<br>" . mysqli_error($conector));
        }
    }

    mysqli_close($conector);
    echo "<br><b>¡Conexión cerrada!</b>";
} else {
    echo "Error al conectarse a MySQL, " . mysqli_connect_error();
}
