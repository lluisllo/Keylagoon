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

    // Comprobar si hay sesión iniciado por un usuario
    if (!isset($_SESSION['id_usuario'])) {
        header("Location: ../");
        exit();
    }

    include 'pdo.php';
    $pdo = new Conexion();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $password = $_POST['contrasena'];
        $date = $_POST['fecha'];
        $motive = $_POST['motivo'];
        $comment = $_POST['comentario'];
        $id_usuario = $_SESSION['id_usuario'];

        // Sentencia sql con placeholders
        $sql = "INSERT INTO contraseñas (id_usuario, contraseña, fecha, motivo, comentario) 
            VALUES (:id_usuario, :password, :date, :motive, :comment)";

        // Preparamos la sentencia
        $stmt = $pdo->prepare($sql);

        // Enlazamos los parametros
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':motive', $motive);
        $stmt->bindParam(':comment', $comment);

        // Execute la sentencia
        if ($stmt->execute()) {
            echo "Contraseña guardada correctamente";
            header("Location: ../");
            exit();
        } else {
            echo "Error al guardar la contraseña";
        }
    } else {
    }
    ?>

</body>

</html>