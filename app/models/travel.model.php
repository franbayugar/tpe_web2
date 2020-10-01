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
        $query = $this->db->prepare('SELECT *, des.id as id_destino FROM `destinos` des INNER JOIN `categoria` ON `id_categoria` = categoria.id;');
        $query->execute();

        // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
        $destination = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de tareas

        return $destination;
    }

    
    function insert($destino, $descripcion, $precio, $fecha, $categoria) {

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('INSERT INTO destinos (destino, descripcion, precio, fecha, id_categoria) VALUES (?,?,?,?,?)');
        $query->execute([$destino, $descripcion, $precio, $fecha, $categoria]);


        // 3. Obtengo y devuelo el ID de la tarea nueva
        return $this->db->lastInsertId();
    }

    function remove($id) {  
  
        $query = $this->db->prepare('DELETE FROM destinos WHERE id = ?');
        $query->execute([$id]);
  }
  
}