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

    //obtener usuario por email
    function getUserByEmail($email)
    {
        //Enviar la consulta (prepare y execute)
        $query = $this->db->prepare('SELECT * FROM usuario WHERE email = ?');
        $query->execute([$email]);

        //Obtengo la respuesta con un fetch
        return $query->fetch(PDO::FETCH_OBJ);
    }

    //verificacion de existencia de user o email
    function getUsers($username, $email)
    {
        $query = $this->db->prepare('SELECT * FROM usuario WHERE username = ? OR email = ?');
        $query->execute([$username, $email]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    //registro de usuario
    function registryUser($username, $email, $password)
    {
        $query = $this->db->prepare('INSERT INTO usuario (username, email, password) VALUES (?,?,?)');
        $query->execute([$username, $email, $password]);
    }
}
