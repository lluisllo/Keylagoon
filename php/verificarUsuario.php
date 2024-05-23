<?php

class verificarUsuario
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function verify($id_usuario, $verification_code)
    {

        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id_usuario = ? AND code = ?");
        $sql->execute([$id_usuario, $verification_code]);
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            $update_sql = $this->pdo->prepare("UPDATE usuarios SET code = NULL WHERE id_usuario = ?");
            $update_sql->execute([$id_usuario]);
            return true;
        } else {
            return false;
        }
    }
}

if (isset($_GET['id']) && isset($_GET['code'])) {
    include 'pdo.php';
    $pdo = new Conexion();

    $id_usuario = $_GET['id'];
    $verification_code = $_GET['code'];

    $verifier = new verificarUsuario($pdo);
    if ($verifier->verify($id_usuario, $verification_code)) {
        echo "Verificación exitosa. Su cuenta ha sido verificada.";
        header("Location: ../");
        exit();
    } else {
        echo "Verificación fallida. El código de verificación no es válido.";
    }
    exit();
} else {
    echo "No se proporcionaron el id o el código de verificación.";
}
