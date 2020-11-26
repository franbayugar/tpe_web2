<?php
require_once 'libs/Router.php';
require_once 'app/api/api-comment.controller.php';


$router = new Router();

//tabla de ruteo

$router->addRoute('comentarios', 'GET', 'ApiCommentController', 'getAll');
$router->addRoute('comentario/:ID', 'GET', 'ApiCommentController', 'getOne');
$router->addRoute('comentarios/:ID', 'GET', 'ApiCommentController', 'getCommentByDestinationID');
$router->addRoute('comentario/:ID', 'DELETE', 'ApiCommentController', 'delete');
$router->addRoute('comentario', 'POST', 'ApiCommentController', 'addComment');
$router->setDefaultRoute('ApiCommentController', 'show404');

//ruteo
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
