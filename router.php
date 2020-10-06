<?php
include_once 'app/controllers/admin.controller.php';
include_once 'app/controllers/main.controller.php';

// defino la base url para la construccion de links con urls semánticas
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

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
        $controller = new MainController();
        $controller->showAbout();
        break;
    case 'filtrar':
        $controller = new MainController();
        $id = $params[1];
        $controller->filter($id);
        break;
    case 'login':
        $controller = new AdminController();
        $controller->showLogin();
        break;
    case 'verify':
        $controller = new AdminController();
        $controller->loginUser();
        break;
    case 'logout':
        $controller = new AdminController();
        $controller->logout();
        break;
    case 'administrador':
        $controller = new AdminController();
        $controller->showAdmin();
        break;
    case 'insertar':
        $controller = new AdminController();
        $id = $params[2];
        if ($params[1] == 'categoria') {
            $controller->addCategory();
        }
        if ($params[1] == 'destino') {
            $controller->addDestination();
        }
        break;
    case 'eliminar': // eliminar/:ID
        $controller = new AdminController();
        $id = $params[2];
        if ($params[1] == 'categoria') {
            $controller->deleteCategory($id);
        }
        if ($params[1] == 'destino') {
            $controller->deleteDestination($id);
        }
        break;
    case 'editar': // editar/:ID
        $controller = new AdminController();
        $id = $params[2];
        if ($params[1] == 'categoria') {
            $controller->updateCategory();
        }
        if ($params[1] == 'destino') {
            $controller->updateDestination();
        }
        break;
    case 'showedit': // editar/:ID
        $controller = new AdminController();
        $id = $params[1];
        $controller->showEdit($id, 'destination');
        break;
    case 'verdetalle': // ver detalle
        $controller = new MainController();
        if ($params[1] != null) {
            $id = $params[1];
            $controller->showMore($id);
        } else {
            echo 'error';
        }
        break;
    case 'destinationmanage':
        $controller = new AdminController();
        $controller->destinationManage();
        break;
    case 'categorymanage':
        $controller = new AdminController();
        $controller->categoryManage();
        break;
    case 'editcategory':
        $controller = new AdminController();
        $id = $params[1];
        $controller->showEdit($id, 'category');
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo ('404 Page not found');
        break;
}
