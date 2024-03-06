<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keylagoon - Conexiones</title>
</head>

<body>
    <h4>Conexiones PHP</h4>
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

        mysqli_close($conector);
        echo "<br><b>¡Conexión cerrada!</b>";
    } else {
        echo "Error al conectarse a MySQL, " . mysqli_connect_error();
    }
    ?>

</body>

</html>