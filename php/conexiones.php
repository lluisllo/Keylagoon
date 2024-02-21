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
// $bbdd = "bbdd.lluisllodraedib.com";
// $port = 3306;
// $conector = mysqli_connect($host, $user, $password, $port);

if ($conector) {
    // Nos conectamos a SQL
    echo "Conectado a mysql con el usuario: <b>" . $user . "</b>";

    // Nos conectamos a la BBDD
    $baseDatos = mysqli_select_db($conector, $bbdd);

    if ($baseDatos) {
        echo "<br>Se ha conectado a la BBDD <b>" . $bbdd . "</b>";
    } else {
        echo "<br>Error al conectarse a la BBDD";
    }

    // Liberamos los resultados
    echo "<br><br> === <b>FIN DE USO DE LA BBDD </b> === <br>";
    // mysqli_free_result($resultado); !!!!!!!!!!!!!!!
    echo "<b>¡Resultados liberados!</b>";

    // Cerramos conexión a mysql_affected_rows
    mysqli_close($conector);
    echo "<br><b>¡Conexión cerrada!</b>";
    echo "<br> ========================== ";
} else {
    echo "Error al conectarse a MySQL, " . mysqli_connect_error();
}
