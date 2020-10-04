<?php

class CategoryModel {

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

    function getAll() {

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('SELECT * FROM categoria');
        $query->execute();

        // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
        $category = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de tareas

        return $category;
    }
    function insert($package, $aliaspackage) {

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('INSERT INTO categoria (paquete, aliaspaquete) VALUES (?,?)');
        $query->execute([$package, $aliaspackage]);


        // 3. Obtengo y devuelo el ID de la tarea nueva
        return $this->db->lastInsertId();
    }

    function remove($id) {  
  
        $query = $this->db->prepare('DELETE FROM categoria WHERE id = ?');
        $query->execute([$id]);
    }
}