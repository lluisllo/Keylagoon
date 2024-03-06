<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keylagoon - Guardar contraseña</title>
</head>

<body>

    <?php

    // Guardar contraseña
    session_start();

    if (!isset($_SESSION['id_usuario'])) {
        header("Location: index.html");
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

    ?>

</body>

</html>