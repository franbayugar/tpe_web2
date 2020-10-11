<?php

class CategoryModel
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

    //obtener todas las categorias
    function getAll()
    {
        //Enviar la consulta (prepare y execute)
        $query = $this->db->prepare('SELECT * FROM categoria');
        $query->execute();

        //Obtengo la respuesta con un fetchAll 
        $category = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de categorias

        //retorno lo que trae
        return $category;
    }
    //obtener una categoria
    function getOne($id)
    {
        //Enviar la consulta (prepare y execute)
        $query = $this->db->prepare('SELECT * FROM categoria WHERE id = ?');
        $query->execute([$id]);

        //Obtengo la respuesta con un fetch 
        $category = $query->fetch(PDO::FETCH_OBJ); //categoria

        //retorno lo que trae
        return $category;
    }
    //insertar categoria a la DB
    function insert($package, $aliaspackage)
    {
        //Enviar la consulta (prepare y execute)
        $query = $this->db->prepare('INSERT INTO categoria (paquete, aliaspaquete) VALUES (?,?)');
        $query->execute([$package, $aliaspackage]);
    }

    //editar categoria en la DB
    function update($package, $aliaspackage, $id)
    {
        //Enviar la consulta (prepare y execute)
        $query = $this->db->prepare('UPDATE categoria 
        SET paquete = ?, aliaspaquete = ?
        WHERE id = ?');
        $query->execute([$package, $aliaspackage, $id]);
    }

    //elminar categoria por id
    function remove($id)
    {
        //Enviar la consulta (prepare y execute)
        $query = $this->db->prepare('DELETE FROM categoria WHERE id = ?');
        $query->execute([$id]);
    }
}
