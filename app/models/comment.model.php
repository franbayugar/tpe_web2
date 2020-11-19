<?php

class CommentModel
{

    private $db;

    function __construct()
    {
        // 1. Abro la conexión
        $this->db = $this->connect();
    }

    //Abre conexión a la base de datos
    private function connect()
    {
        $db = new PDO('mysql:host=localhost;' . 'dbname=db_travelpage;charset=utf8', 'root', '');
        return $db;
    }

    function getAll()
    {
        //Enviar la consulta (prepare y execute)
        $query = $this->db->prepare('SELECT * FROM comentario');
        $query->execute();

        //Obtengo la respuesta con un fetchAll 
        $comments = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de comentarios

        //retorno lo que trae
        return $comments;
    }
}
