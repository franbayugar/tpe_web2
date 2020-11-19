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
    }

    //traemos todos los comentarios
    function getAll()
    {
        $comments = $this->model->getAll();
        $this->view->response($comments);
    }
}
