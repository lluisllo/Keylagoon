<?php
class Conexion extends PDO
{

    // Credenciales locales
    private $host = "localhost";
    private $user = "edib";
    private $password = "edib";
    private $bbdd = "ddb219298";

    // Credenciales
    // private $host = "bbdd.lluisllodraedib.com";
    // private $user = "ddb219298";
    // private $password = "7894561Ll";
    // private $bbdd = "ddb219298";
    // private $port = 3306;

    public function __construct()
    {
        try {
            parent::__construct(
                'mysql:host=' .
                    $this->host . ';dbname=' .
                    $this->bbdd . ';charset=utf8',
                $this->user,
                $this->password,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            exit;
        }
    }
}
