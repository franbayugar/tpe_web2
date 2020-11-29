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

    //obtener todos los comentarios
    function getAll($parametros = null)
    {
        $sql = 'SELECT comentario.id, comentario.descripcion, comentario.puntuacion, usuario.username, destino.destino FROM `comentario` INNER JOIN `usuario` ON `id_usuario` = usuario.id INNER JOIN `destino` ON `id_destino` = destino.id';
        if (isset($parametros['order'])) {
            $sql .= ' ORDER BY ' . $parametros['order'];
            if (isset($parametros['sort'])) {
                $sql .= ' ' . $parametros['sort'];
            }
        }
        //Enviar la consulta (prepare y execute)
        $query = $this->db->prepare($sql);
        $query->execute();

        //Obtengo la respuesta con un fetchAll 
        $comments = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de comentarios

        //retorno lo que trae
        return $comments;
    }

    function getCommentByIDUser($idUser, $idDestination)
    {
        $query = $this->db->prepare('SELECT * FROM comentario WHERE id_usuario = ? AND id_destino = ?');
        $query->execute([$idUser, $idDestination]);

        //Obtengo la respuesta con un fetchAll 
        $comments = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de comentarios

        //retorno lo que trae
        return $comments;
    }

    //obtener comentario por ID de destino
    function getByDestinationID($id)
    {
        //Enviar la consulta (prepare y execute)
        $query = $this->db->prepare('SELECT comentario.id, comentario.descripcion, comentario.puntuacion, usuario.username, destino.destino FROM `comentario` INNER JOIN `usuario` ON `id_usuario` = usuario.id INNER JOIN `destino` ON `id_destino` = destino.id WHERE id_destino = ?');
        $query->execute([$id]);

        //Obtengo la respuesta con un fetchAll 
        $comments = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de comentarios

        //retorno lo que trae
        return $comments;
    }

    //obtener un comentario por id
    function getOne($id)
    {
        //Enviar la consulta (prepare y execute)
        $query = $this->db->prepare('SELECT comentario.id, comentario.descripcion, comentario.puntuacion, usuario.username, destino.destino FROM `comentario` INNER JOIN `usuario` ON `id_usuario` = usuario.id INNER JOIN `destino` ON `id_destino` = destino.id WHERE comentario.id = ?');
        $query->execute([$id]);

        //Obtengo la respuesta con un fetch 
        $comments = $query->fetch(PDO::FETCH_OBJ);

        //retorno lo que trae
        return $comments;
    }

    //borrar comentario
    function deleteComment($id)
    {
        //Enviar la consulta (prepare y execute)
        $query = $this->db->prepare('DELETE FROM comentario WHERE id = ?');
        $query->execute([$id]);
        return $query->rowCount();
    }

    //insertar comentario llegan por parametro los valores
    function insertComment($comment, $score, $idUser, $idDestination)
    {
        //Enviar la consulta (prepare y execute)
        $query = $this->db->prepare('INSERT INTO comentario (descripcion, puntuacion, id_usuario, id_destino) VALUES (?,?,?,?)');
        $query->execute([$comment, $score, $idUser, $idDestination]);
        return $query->rowCount();
    }
}
