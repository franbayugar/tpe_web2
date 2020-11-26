<?php
require_once 'app/models/comment.model.php';
require_once 'app/api/api-comment.view.php';
include_once 'helpers/auth.helper.php';


class ApiCommentController
{

    private $model;
    private $view;

    function __construct()
    {
        $this->model = new CommentModel();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
    }

    //convierte variable en json
    function getData()
    {
        return json_decode($this->data);
    }

    //traemos todos los comentarios y en orden en caso de ser requerido
    function getAll($params = null)
    {
        $parametros = [];
        if (isset($_GET['sort'])) {
            $parametros['sort'] = $_GET['sort'];
        }

        if (isset($_GET['order'])) {
            $parametros['order'] = $_GET['order'];
        }

        $comments = $this->model->getAll($parametros);
        $this->view->response($comments, 200);
    }

    /* obtengo los comentarios filtrados por ID de destino*/
    function getCommentByDestinationID($params = null)
    {
        $idDestination = $params[':ID'];
        $comments = $this->model->getByDestinationID($idDestination);
        if ($comments) {
            $this->view->response($comments, 200);
        } else {
            $this->view->response("El comentario con el id=$idDestination no existe", 404);
        }
    }

    //obtener comentario por ID
    function getOne($params = null)
    {
        $idComment = $params[':ID'];
        $comment = $this->model->getOne($idComment);
        if ($comment) {
            $this->view->response($comment, 200);
        } else {
            $this->view->response("El comentario con el id=$idComment no existe", 404);
        }
    }

    //borrado de comentario
    function delete($params = null)
    {
        //checkeo que el user se admin para poder ejecutar el borrado
        AuthHelper::checkAdmin();

        $idComment = $params[':ID'];
        $comprobation = $this->model->deleteComment($idComment);
        if ($comprobation) {
            $this->view->response("El comentario con el id=$idComment se borró exitosamente", 200);
        } else {
            $this->view->response("El comentario con el id=$idComment no existe", 404);
        }
    }

    //agregado de comentario
    function addComment()
    {
        $body = $this->getData();
        //guardo los valores del body en variables
        $comment = $body->descripcion;
        $idUser = $body->id_usuario;
        $score = $body->puntuacion;
        $idDestination = $body->id_destino;

        //verifico que no haya campos vacios
        if ($comment != null && $score != null) {
            $idComment = $this->model->insertComment($comment, $score, $idUser, $idDestination);
        } else {
            $this->view->response("El comentario no pudo insertarse", 500);
            die();
        }
        //verifico que el comentario se inserto exitosamente
        if ($idComment > 0) {
            $this->view->response("El comentario con el id=$idComment se insertó exitosamente", 200);
        } else {
            $this->view->response("El comentario no pudo insertarse", 500);
        }
    }

    //mostrar 404
    function show404($params = null)
    {
        $this->view->response('El recurso solicitaod no existe', 404);
    }
}
