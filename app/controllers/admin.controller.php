<?php

//incluimos archivos a utilizar
include_once 'app/views/admin.view.php';
include_once 'app/models/travel.model.php';
include_once 'app/models/category.model.php';
include_once 'app/models/user.model.php';
include_once 'helpers/auth.helper.php';

class AdminController
{
    private $view;
    private $travelModel;
    private $categoryModel;
    private $userModel;

    //instanciamos los objetos
    function __construct()
    {
        $this->view = new AdminView();
        $this->travelModel = new TravelModel();
        $this->categoryModel = new CategoryModel();
        $this->userModel = new UserModel();
    }

    //mostrar login
    function showLogin()
    {
        //check del login
        AuthHelper::checkLogged();

        // actualizo la vista
        $this->view->showLogin();
    }

    //verificar login
    function loginUser()
    {
        //se verifican que los campos esten completos
        if (!empty($_POST['mail']) && !empty($_POST['password'])) {
            $email = $_POST['mail'];
            $password = $_POST['password'];
            $user = $this->userModel->getUserByEmail($email);
            //chequeamos que la password ingresada sea correcta y el usuario exista
            if ($user && (password_verify($password, $user->password))) {
                //abro sesion y guardo al usuario
                session_start();
                $_SESSION['ID_USER'] = $user->id;
                $_SESSION['username'] = $user->email;
                $_SESSION['mail'] = $user->email;
                $_SESSION['permission'] = $user->permission;

                header("Location: " . BASE_URL . 'administrador');
            } else {
                //muestro el login con mensaje de error por usuario o pass incorrectos
                $this->view->showLogin('Usuario o contraseña incorrectos');
            }
        } else {
            //muestro el login con mensaje de error por falta de datos
            $this->view->showLogin('Faltan datos obligatorios');
        }
    }

    //mostrar pagina de administrador
    function showAdmin()
    {
        AuthHelper::checkAdmin();
        //llamado a la vista
        $this->view->showAdmin();
    }

    //agregar destino
    function addDestination()
    {
        //check login
        AuthHelper::checkAdmin();
        // verifico campos obligatorios
        if (empty($_POST['place']) || empty($_POST['shortdescription']) || empty($_POST['description']) || empty($_POST['value']) || empty($_POST['category'])) {
            $destination = $this->travelModel->getAll();
            $category = $this->categoryModel->getAll();
            $this->view->showDestinationManage($category, $destination, 'Faltan datos obligatorios');
            die();
        }

        //guardo lo que llega del form por post en variables
        $place = $_POST['place'];
        $shortdescription = $_POST['shortdescription'];
        $description = $_POST['description'];
        $value = $_POST['value'];
        $category = $_POST['category'];

        // inserto el destino en la DB
        $id = $this->travelModel->insert($place, $shortdescription, $description, $value, $category);

        // redirigimos a la pagina del manejo de destino
        header("Location: " . BASE_URL . 'destinationmanage');
    }

    //agregar categoria
    function addCategory()
    {
        //check login
        AuthHelper::checkAdmin();
        // verifico campos obligatorios
        if (empty($_POST['package']) || empty($_POST['aliaspackage'])) {
            $category = $this->categoryModel->getAll();
            $this->view->showCategoryManage($category, 'Faltan datos obligatorios');
            die();
        }
        //guardo lo que llega del form por post en variables
        $package = $_POST['package'];
        $aliaspackage = $_POST['aliaspackage'];
        $aliaspackage = strtoupper($aliaspackage);
        // inserto la categoria en la DB
        $this->categoryModel->insert($package, $aliaspackage);

        // redirigimos al listado
        header("Location: " . BASE_URL . 'categorymanage');
    }

    //borrar destino
    function deleteDestination($id)
    {
        //check login
        AuthHelper::checkAdmin();
        //enviamos por parametro la id del destino a borrar al modal travel
        $this->travelModel->remove($id);
        //redirigmos
        header("Location: " . BASE_URL . 'destinationmanage');
    }

    //borrar categoria
    function deleteCategory($id)
    {
        //check login
        AuthHelper::checkAdmin();
        //enviamos por parametro la id de la categoria a borrar al modal category
        $comprobation = $this->travelModel->getOneByCategory($id);
        if ($comprobation) {
            $category = $this->categoryModel->getAll();
            $this->view->showCategoryManage($category, "No se puede eliminar la categoría '$comprobation->paquete' porque está en uso");
            die();
        }

        $this->categoryModel->remove($id);

        //redirigmos
        header("Location: " . BASE_URL . 'categorymanage');
    }

    //mostrar para editar
    function showEdit($id, $filter)
    {
        //check login
        AuthHelper::checkAdmin();

        //verifico que es lo que pidio el usuario
        if ($filter == 'destination') {
            $destination = $this->travelModel->getOne($id);
            $category = $this->categoryModel->getAll();
            //chequeo que lo pedido exista en la base de datos
            if ($category != null || $destination != null) {
                $this->view->showEdit($category, $destination);
            } else {
                $this->view->showError();
            }
        }
        if ($filter == 'category') {
            $category = $this->categoryModel->getOne($id);
            //chequeo que lo pedido exista en la base de datos
            if ($category != null) {
                $this->view->showEdit($category);
            } else {
                $this->view->showError();
            }
        }
    }

    //actualizar destino en la db
    function updateDestination()
    {
        //check login
        AuthHelper::checkAdmin();

        // verifico campos obligatorios
        if (empty($_POST['place']) || empty($_POST['shortdescription']) || empty($_POST['description']) || empty($_POST['value']) || empty($_POST['category'])  || empty($_POST['id'])) {
            $destination = $this->travelModel->getAll();
            $category = $this->categoryModel->getAll();
            $this->view->showDestinationManage($category, $destination, 'Faltan datos obligatorios');
            die();
        }
        //guardo los datos en variables
        $place = $_POST['place'];
        $shortdescription = $_POST['shortdescription'];
        $description = $_POST['description'];
        $value = $_POST['value'];
        $category = $_POST['category'];
        $id = $_POST['id'];

        // inserto el destino en la DB
        $this->travelModel->update($place, $shortdescription, $description, $value, $category, $id);

        // redirigimos
        header("Location: " . BASE_URL . 'destinationmanage');
    }

    //actualizar categoria en la db
    function updateCategory()
    {
        //check login
        AuthHelper::checkAdmin();
        // verifico campos obligatorios
        if (empty($_POST['package']) || empty($_POST['aliaspackage']) || empty($_POST['id'])) {
            $category = $this->categoryModel->getAll();
            $this->view->showCategoryManage($category, 'Faltan datos obligatorios');
            die();
        }

        //guardo datos en variables
        $package = $_POST['package'];
        $aliaspackage = $_POST['aliaspackage'];
        $aliaspackage = strtoupper($aliaspackage);
        $id = $_POST['id'];

        // inserto la tarea en la DB
        $this->categoryModel->update($package, $aliaspackage, $id);

        // redirigimos
        header("Location: " . BASE_URL . 'categorymanage');
    }

    //mostrar pagina para administrar destinos
    function destinationManage()
    {
        //check login
        AuthHelper::checkAdmin();

        $destination = $this->travelModel->getAll();
        $category = $this->categoryModel->getAll();
        $this->view->showDestinationManage($category, $destination);
    }

    //mostrar pagina para administrar categorias
    function categoryManage()
    {
        //check login
        AuthHelper::checkAdmin();

        $category = $this->categoryModel->getAll();
        $this->view->showCategoryManage($category);
    }

    function registry()
    {
        //check login
        AuthHelper::checkLogged();
        //llamado a la vista
        $this->view->showRegister();
    }

    function addUser()
    {
        //CONSULTAR
        AuthHelper::checkLogged();
        //compruebo que no haya campos vacios

        if (
            empty($_POST['user']) || empty($_POST['mail']) || empty($_POST['password'])
            || empty($_POST['password-confirm'])
        ) {
            $this->view->showRegister('Faltan datos obligatorios');
            die();
        }

        //compruebo que el mail ingresado sea valido
        if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $this->view->showRegister('Mail inválido');
            die();
        }

        //compruebo que las contraseñas coincidan
        if ($_POST['password'] != $_POST['password-confirm']) {
            $this->view->showRegister('Las contraseñas no coinciden');
            die();
        }

        $username = $_POST['user'];
        $email = $_POST['mail'];
        $password = $_POST['password'];

        //compruebo que la contraseña tenga mas de 6 caracteres
        if (strlen($password) < 6) {
            $this->view->showRegister('La contraseña debe ser de 6 o más caracteres');
            die();
        }
        $user = $this->userModel->getUsers($username, $email);
        //compruebo que no se quiera ingresar el mismo usuario o email
        if ($user != null) {
            $this->view->showRegister('El nombre de usuario o e-mail ya existen');
            die();
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $this->userModel->registryUser($username, $email, $hash);
        $this->loginUser();
    }

    function usersPage()
    {
        AuthHelper::checkAdmin();

        $users = $this->userModel->getAll();
        $this->view->showUsersManage($users);
        die();
    }

    function deleteUser($id)
    {
        //check login
        AuthHelper::checkAdmin();
        //enviamos por parametro la id del user a borrar
        if ($id != $_SESSION['ID_USER']) {
            $this->userModel->remove($id);
            //redirigmos
            header("Location: " . BASE_URL . 'usersmanage');
        } else { //en caso de estar la sesion iniciada enviamos un mensaje notificando
            $users = $this->userModel->getAll();
            $this->view->showUsersManage($users, 'No se puede eliminar una cuenta con la sesión iniciada');
        }
    }

    function showPermission($id)
    {
        //check login
        AuthHelper::checkAdmin();
        //verifico que es lo que pidio el usuario
        $user = $this->userModel->getUserById($id);
        //chequeo que lo pedido exista en la base de datos
        if ($user != null) {
            $this->view->showEditUser($user);
        } else {
            $this->view->showError();
        }
    }

    function updatePermission()
    {
        AuthHelper::checkAdmin();

        if (!isset($_POST['permission']) || !isset($_POST['id']) || ($_SESSION['ID_USER'] == $_POST['id'])) {
            $users = $this->userModel->getAll();
            $this->view->showUsersManage($users, 'No se pueden editar los permisos de una cuenta con la sesión iniciada');
            die();
        }
        $permission = $_POST['permission'];
        $id = $_POST['id'];

        $this->userModel->updatePermission($permission, $id);
        header("Location: " . BASE_URL . "usersmanage");
    }

    //funcion para desloguearse
    function logout()
    {
        AuthHelper::logout();
    }
    function showError()
    {
        session_start();
        $this->view->showError();
    }
}
