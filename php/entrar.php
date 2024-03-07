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
    include 'pdo.php';
    $pdo = new Conexion();

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['contrasena'];

        // Recuperar usuario de la BBDD 
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $sql->execute([$email]);
        $user = $sql->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['contraseña'])) {
                // Set session variables
                $_SESSION['id_usuario'] = $user['id_usuario'];
                $_SESSION['email'] = $user['email']; // Set the email in the session
                echo "Login exitoso";
                header("Location: ../");
                exit();
            } else {
                echo "Contraseña incorrecta";
            }
        } else {
            echo "Este usuario no existe";
        }
    } else {
        echo "<b>Error, condición if no cumplida</b>";
    }
    ?>



</body>

</html>