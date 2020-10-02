<?php 

class UserModel{
    private $db;

    function __construct() {
        // 1. Abro la conexión
        $this->db = $this->connect();
    }
    /**
     * Abre conexión a la base de datos;
     */
    private function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=db_travelpage;charset=utf8', 'root', '');
        return $db;
    }

    function getUserByEmail($email) {
        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('SELECT * FROM usuario WHERE email = ?');
        $query->execute([$email]);

        // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
        return $query->fetch(PDO::FETCH_OBJ);
    }
}