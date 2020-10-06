<?php

class UserModel
{
    private $db;

    function __construct()
    {
        // 1. Abro la conexión
        $this->db = $this->connect();
    }

    //Abre conexión a la base de datos;
    private function connect()
    {
        $db = new PDO('mysql:host=localhost;' . 'dbname=db_travelpage;charset=utf8', 'root', '');
        return $db;
    }

    //obtenre usuario por email
    function getUserByEmail($email)
    {
        //Enviar la consulta (prepare y execute)
        $query = $this->db->prepare('SELECT * FROM usuario WHERE email = ?');
        $query->execute([$email]);

        //Obtengo la respuesta con un fetch
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
