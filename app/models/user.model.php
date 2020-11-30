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

    function getAll()
    {
        $query = $this->db->prepare('SELECT * FROM usuario');
        $query->execute();

        //Obtengo la respuesta con un fetch
        return $query->fetchAll(PDO::FETCH_OBJ);
    }


    function getUserById($id)
    {
        //Enviar la consulta (prepare y execute)
        $query = $this->db->prepare('SELECT * FROM usuario WHERE id = ?');
        $query->execute([$id]);

        //Obtengo la respuesta con un fetch
        return $query->fetch(PDO::FETCH_OBJ);
    }

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

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    //registro de usuario
    function registryUser($username, $email, $password)
    {
        $query = $this->db->prepare('INSERT INTO usuario (username, email, password) VALUES (?,?,?)');
        $query->execute([$username, $email, $password]);
    }

    //actualizo permisos
    function updatePermission($permission, $id)
    {
        $query = $this->db->prepare('UPDATE usuario 
        SET permission = ?
        WHERE id = ?');
        $query->execute([$permission, $id]);
    }

    function remove($id)
    {
        $query = $this->db->prepare('DELETE FROM usuario WHERE id = ?');
        $query->execute([$id]);

        return $this->db->lastInsertId();
    }
}
