<?php
require_once 'libs/Router.php';
require_once 'app/api/api-comment.controller.php';


$router = new Router();

//tabla de ruteo

$router->addRoute('comentarios', 'GET', 'ApiCommentController', 'getAll');
$router->addRoute('comentarios/:ID', 'GET', 'ApiCommentController', 'getOne');
$router->addRoute('comentarios/destino/:ID', 'GET', 'ApiCommentController', 'getDestinationByID');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiCommentController', 'delete');
$router->addRoute('comentarios', 'POST', 'ApiCommentController', 'addComment');
$router->setDefaultRoute('ApiCommentController', 'show404');

//ruteo
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
