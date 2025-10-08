<?php

class Model {
    // Ejemplo básico para conexión a base de datos (PDO)
    protected $db;

    public function __construct() {
        $dsn = 'mysql:host=localhost;dbname=mi_base_datos;charset=utf8';
        $user = 'usuario';
        $pass = 'contraseña';

        try {
            $this->db = new PDO($dsn, $user, $pass);
        } catch (PDOException $e) {
            die("Error al conectar a la base de datos: " . $e->getMessage());
        }
    }
}
