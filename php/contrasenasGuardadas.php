<?php
// Asegura que haya un usuario en sesión
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../");
    exit();
}

include 'pdo.php';
$pdo = new Conexion();

// Busca las contraseñas del usuario
$id_usuario = $_SESSION['id_usuario'];
$sql = "SELECT contraseña, fecha, motivo, comentario FROM contraseñas WHERE id_usuario = :id_usuario";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id_usuario', $id_usuario);
$stmt->execute();
$passwords = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keylagoon - Contraseñas guardadas</title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="container">

        <header>
            <!--  -->

            <picture>
                <div class="header__logo">
                    <img src="../svg/Logo.svg" alt="" style="height: 101px" />
                </div>
            </picture>

            <h1>Keylagoon</h1>

            <!-- Entrar / Registrarse -->
            <h3 class="entrar-registrarse">
                <!-- Si hay un usuario -->
                <?php
                if (isset($_SESSION['id_usuario']) && isset($_SESSION['email'])) {
                    $user_email = explode('@', $_SESSION['email'])[0];
                    echo "<p class='nombre-usuario'>$user_email</p>";
                ?>
                    <form class="logout-form" action="logout.php" method="post">
                        <input type="submit" value="Logout" class="logout-input">
                    </form>

                    <!-- Si no hay un usuario en sesión -->
                <?php
                } else {
                ?>
                    <p onclick="interfaceEntrar()">Entrar</p>
                    <p>&nbsp;/&nbsp;</p>
                    <p onclick="interfaceRegistrarse()">Registrarse</p>
                <?php
                }
                ?>
            </h3>

            <a href="../" class="contrasenas-guardadas">
                <button class="header__bbdd">
                    Inicio
                </button>
            </a>

            <!--  -->
        </header>

        <main class="main-contrasenas-guardadas">
            <h4>Mis Contraseñas</h4>

            <?php if (!empty($passwords)) : ?>
                <ul class="password-list">
                    <!-- Listado de contraseñas -->
                    <?php foreach ($passwords as $password) : ?>
                        <li class="contrasenas-guardadas-php">
                            <div class="contenedor-contrasenas">

                                <strong>Fecha:</strong> <?php echo $password['fecha']; ?>
                                <strong>Motivo:</strong> <?php echo $password['motivo']; ?>
                                <strong>Comentario:</strong> <?php echo $password['comentario']; ?>
                                <strong>Contraseña:</strong> <?php echo $password['contraseña']; ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <p>No hay contraseñas guardadas.</p>
            <?php endif; ?>
        </main>
    </div>

</body>

</html>