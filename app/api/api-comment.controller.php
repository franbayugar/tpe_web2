<?php
require_once 'app/models/comment.model.php';
require_once 'app/api/api-comment.view.php';


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

    //traemos todos los comentarios
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

    function delete($params = null)
    {
        $idComment = $params[':ID'];
        $comprobation = $this->model->deleteComment($idComment);
        if ($comprobation) {
            $this->view->response("El comentario con el id=$idComment se borró exitosamente", 200);
        } else {
            $this->view->response("El comentario con el id=$idComment no existe", 404);
        }
    }

    function addComment()
    {
        $body = $this->getData();

        $comment = $body->descripcion;
        $idUser = $body->id_usuario;
        $score = $body->puntuacion;
        $idDestination = $body->id_destino;

        $idComment = $this->model->insertComment($comment, $score, $idUser, $idDestination);

        if ($idComment > 0) {
            $this->view->response("El comentario con el id=$idComment se insertó exitosamente", 200);
        } else {
            $this->view->response("El comentario no pudo insertarse", 500);
        }
    }

    function show404($params = null)
    {
        $this->view->response('El recurso solicitaod no existe', 404);
    }
}
