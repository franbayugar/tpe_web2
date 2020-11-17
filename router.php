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

$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {
        //ir a home
    case 'inicio':
        $controller = new MainController();
        $controller->showHome();
        break;
        //ir a about
    case 'nosotros':
        $controller = new MainController();
        $controller->showAbout();
        break;
        //filtro para home - se hace mediante ajax
    case 'filtrar':
        $controller = new MainController();
        if (!empty($params[1]) || $params[1] == '0') {
            $id = $params[1];
            $controller->filter($id);
        }
        break;
        //url q lleva a login
    case 'login':
        $controller = new AdminController();
        $controller->showLogin();
        break;
        //verificar inicio de sesion
    case 'verify':
        $controller = new AdminController();
        $controller->loginUser();
        break;
        //desloguearse
    case 'logout':
        $controller = new AdminController();
        $controller->logout();
        break;
        //pagina principal para administrador
    case 'administrador':
        $controller = new AdminController();
        $controller->showAdmin();
        break;
        //insertar destino o categoria
    case 'insertar':
        $controller = new AdminController();
        if (!empty($params[1])) {
            if ($params[1] == 'categoria') {
                $controller->addCategory();
            }
            if ($params[1] == 'destino') {
                $controller->addDestination();
            }
        } else {
            $controller->showError();
        }
        break;
        // eliminar x ID
    case 'eliminar':
        $controller = new AdminController();
        if (!empty($params[1]) && !empty($params[2])) {
            if ($params[1] == 'categoria') {
                $id = $params[2];
                $controller->deleteCategory($id);
            }
            if ($params[1] == 'destino') {
                $id = $params[2];
                $controller->deleteDestination($id);
            }
        } else {
            $controller->showError();
        }
        break;
        //mostrar editar
    case 'showedit': // editar/:ID
        $controller = new AdminController();
        if (!empty($params[1]) && !empty($params[2])) {
            if ($params[1] == 'category') {
                $controller->showEdit($params[2], 'category');
            } else if ($params[1] == 'destination') {
                $controller->showEdit($params[2], 'destination');
            } else {
                $controller->showError();
            }
        } else {
            $controller->showError();
        }
        break;
        // editar x ID
    case 'editar':
        $controller = new AdminController();
        if (!empty($params[1])) {
            if ($params[1] == 'categoria') {
                $controller->updateCategory();
            }
            if ($params[1] == 'destino') {
                $controller->updateDestination();
            }
        } else {
            $controller->showError();
        }
        break;
        // ver detalle
    case 'verdetalle':
        $controller = new MainController();
        if (!empty($params[1])) {
            $id = $params[1];
            $controller->showMore($id);
        } else {
            $controller->showError();
        }
        break;
        //administrar destinos
    case 'destinationmanage':
        $controller = new AdminController();
        $controller->destinationManage();
        break;
        //administrar categorias
    case 'categorymanage':
        $controller = new AdminController();
        $controller->categoryManage();
        break;
    case 'register':
        $controller = new AdminController();
        $controller->registry();
        break;
    case 'registry-user':
        $controller = new AdminController();
        $controller->addUser();
        break;
    case 'usersmanage':
        $controller = new AdminController();
        $controller->usersPage();
        break;
    case 'eliminar-usuario':
        $controller = new AdminController();
        $id = $params[1];
        $controller->deleteUser($id);
        break;
    case 'permisos':
        $controller = new AdminController();
        $id = $params[1];
        $controller->showPermission($id);
        break;
    case 'editarpermisos':
        $controller = new AdminController();
        $controller->updatePermission();
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        $controller = new MainController();
        $controller->showError();
        break;
}
