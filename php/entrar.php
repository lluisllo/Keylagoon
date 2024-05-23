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
            if (is_null($user['code']) || $user['code'] === '') {
                if (password_verify($password, $user['contraseña'])) {
                    $_SESSION['id_usuario'] = $user['id_usuario'];
                    $_SESSION['email'] = $user['email'];
                    echo "Login exitoso";
                    header("Location: ../");
                    exit();
                } else {
                    echo "Contraseña incorrecta";
                }
            } else {
                echo "Usuario no verificado, consulte su email";
            }
        } else {
            echo "Email y/o contraseña incorrectos";
        }
    } else {
        echo "Email y/o contraseña incorrectos (user)";
    }
    ?>


</body>

</html>