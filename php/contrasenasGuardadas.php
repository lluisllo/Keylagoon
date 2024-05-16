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

                    <a href="../" class="">
                        <button class="contrasenas-guardadas">
                            Inicio
                        </button>
                    </a>

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



            <!--  -->
        </header>

        <main class="main-contrasenas-guardadas">
            <h4>Mis Contraseñas</h4>

            <?php if (!empty($passwords)) : ?>
                <table class="tabla-contrasenas">
                    <thead>
                        <tr class="tabla-cabezeras">    
                            <th>Fecha</th>
                            <th>Motivo</th>
                            <th>Comentario</th>
                            <th>Contraseña</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Listado de contraseñas -->
                        <?php foreach ($passwords as $password) : ?>
                            <tr class="tabla-contenido ">
                                <td><?php echo $password['fecha']; ?></td>
                                <td><?php echo $password['motivo']; ?></td>
                                <td><?php echo $password['comentario']; ?></td>
                                <td><?php echo $password['contraseña']; ?></td>
                                <td>
                                    <img src="../svg/Eliminar.svg" alt="" class="btn-eliminar-contrasena">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>No hay contraseñas guardadas.</p>
            <?php endif; ?>


            <!-- controles -->

        </main>
    </div>

</body>

</html>