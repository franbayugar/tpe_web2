<?php

class TravelModel
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

    //Devuelve todos los destinos de la base de datos.
    function getAll()
    {
        //Enviar la consulta (prepare y execute)
        $query = $this->db->prepare('SELECT *, des.id as id_destino FROM `destino` des INNER JOIN `categoria` ON `id_categoria` = categoria.id;');
        $query->execute();

        //Obtengo la respuesta con un fetchAll (porque son muchos)
        $destination = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de tareas

        //retorno lo que trae
        return $destination;
    }

    //obtener un destino
    function getOne($id)
    {
        //Enviar la consulta (prepare y execute)
        $query = $this->db->prepare('SELECT *, destino.id as id_destino FROM `destino` INNER JOIN `categoria` ON `id_categoria` = categoria.id WHERE destino.id = ?');
        $query->execute([$id]);

        // Obtengo la respuesta con un fetch
        $destination = $query->fetch(PDO::FETCH_OBJ); //destino

        //retorno lo que trae
        return $destination;
    }

    //obtener un destino por categoria
    function getByCategory($id)
    {
        //Enviar la consulta (prepare y execute)
        $query = $this->db->prepare('SELECT *, destino.id as id_destino FROM `destino` INNER JOIN `categoria` ON `id_categoria` = categoria.id WHERE id_categoria = ?');
        $query->execute([$id]);

        // Obtengo la respuesta con un fetchAll
        $destination = $query->fetchAll(PDO::FETCH_OBJ); //destino

        //retorno lo que trae
        return $destination;
    }

    //insertar datos
    function insert($place, $shortdescription, $description, $value, $category)
    {
        //Enviar la consulta (prepare y execute)
        $query = $this->db->prepare('INSERT INTO destino (destino, descripcion_breve, descripcion, precio, id_categoria) VALUES (?,?,?,?,?)');
        $query->execute([$place, $shortdescription, $description, $value, $category]);
    }

    //eliminar datos
    function remove($id)
    {
        //Enviar la consulta (prepare y execute)
        $query = $this->db->prepare('DELETE FROM destino WHERE id = ?');
        $query->execute([$id]);
    }

    //actualizar datos
    function update($place, $shortdescription, $description, $value, $category, $id)
    {
        //Enviar la consulta (prepare y execute)
        $query = $this->db->prepare('UPDATE destino 
        SET destino = ?, descripcion_breve = ?, descripcion = ?, precio = ?, id_categoria = ?
        WHERE id = ?');
        $query->execute([$place, $shortdescription, $description, $value, $category, $id]);
    }
}
