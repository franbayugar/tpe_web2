<?php

class TravelModel {

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

    /**
     * Devuelve todas las tareas de la base de datos.
     */
    function getAll() {

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('SELECT *, des.id as id_destino FROM `destino` des INNER JOIN `categoria` ON `id_categoria` = categoria.id;');
        $query->execute();

        // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
        $destination = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de tareas

        return $destination;
    }

    function getOne($id) {

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('SELECT *, destino.id as id_destino FROM `destino` INNER JOIN `categoria` ON `id_categoria` = categoria.id WHERE destino.id = ?');
        $query->execute([$id]); 
        // 3. Obtengo la respuesta con un fetch (porque son muchos)
        $destination = $query->fetch(PDO::FETCH_OBJ); //tarea

        return $destination;
    }

    function getByCategory($id) {

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('SELECT *, destino.id as id_destino FROM `destino` INNER JOIN `categoria` ON `id_categoria` = categoria.id WHERE id_categoria = ?');
        $query->execute([$id]); 
        // 3. Obtengo la respuesta con un fetch (porque son muchos)
        $destination = $query->fetchAll(PDO::FETCH_OBJ); //tarea

        return $destination;
    }

    
    function insert($place, $shortdescription, $description, $value, $category) {

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('INSERT INTO destino (destino, descripcion_breve, descripcion, precio, id_categoria) VALUES (?,?,?,?,?)');
        $query->execute([$place, $shortdescription, $description, $value, $category]);
        // 3. Obtengo y devuelo el ID de la tarea nueva
    }

    function remove($id) {  
  
        $query = $this->db->prepare('DELETE FROM destino WHERE id = ?');
        $query->execute([$id]);
    }

    function update($place, $shortdescription, $description, $value, $category, $id) {  
        $query = $this->db->prepare('UPDATE destino 
        SET destino = ?, descripcion_breve = ?, descripcion = ?, precio = ?, id_categoria = ?
        WHERE id = ?');
        $query->execute([$place, $shortdescription, $description, $value, $category, $id]);
    }
}