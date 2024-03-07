<?php
// Inicio de sesión
session_start();


// Eliminar variables
$_SESSION = array();

// Cerrar session
session_destroy();

// Redirección al index
header("Location: ../");
exit();
