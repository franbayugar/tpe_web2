<?php
include_once 'app/controllers/admin.controller.php';
include_once 'app/controllers/main.controller.php';

// defino la base url para la construccion de links con urls semánticas
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'inicio'; // acción por defecto si no envían
}

// parsea la accion Ej: suma/1/2 --> ['suma', 1, 2]
$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'inicio':
        $controller = new MainController();
        $controller->showHome();
        break;
    case 'nosotros':
        break;
    case 'adminlogin':
        $controller = new AdminController();
        $controller->showLogin();
        break;
    case 'admin':
        $controller = new AdminController();
        $controller->checkLogin();
        break;
    case 'insertar':
        $controller = new AdminController();
        $controller->addDestination();
        break;
    case 'eliminar': // eliminar/:ID
        $controller = new AdminController();
        $id = $params[1];
        $controller->deleteDestination($id);
        break;        
    default:
        header("HTTP/1.0 404 Not Found");
        echo('404 Page not found');
        break;
}
