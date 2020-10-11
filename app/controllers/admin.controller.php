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
        if (!empty($_POST['user']) && !empty($_POST['password'])) {
            $email = $_POST['user'];
            $password = $_POST['password'];
            $user = $this->userModel->getUserByEmail($email);

            //chequeamos que la password ingresada sea correcta y el usuario exista
            if ($user && (password_verify($password, $user->password))) {
                //abro sesion y guardo al usuario
                session_start();
                $_SESSION['ID_USER'] = $user->id;
                $_SESSION['username'] = $user->email;

                //redirijo a la pagina de administrador
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
        //check login
        AuthHelper::checkLoggedIn();
        //llamado a la vista
        $this->view->showAdmin();
    }

    //agregar destino
    function addDestination()
    {
        //check login
        AuthHelper::checkLoggedIn();
        // verifico campos obligatorios
        if (empty($_POST['place']) || empty($_POST['shortdescription']) || empty($_POST['description']) || empty($_POST['value']) || empty($_POST['category'])) {
            $this->view->showError();
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
        AuthHelper::checkLoggedIn();

        // verifico campos obligatorios
        if (empty($_POST['package']) || empty($_POST['aliaspackage'])) {
            $this->view->showError('Faltan datos obligatorios');
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
        AuthHelper::checkLoggedIn();
        //enviamos por parametro la id del destino a borrar al modal travel
        $this->travelModel->remove($id);
        //redirigmos
        header("Location: " . BASE_URL . 'destinationmanage');
    }

    //borrar categoria
    function deleteCategory($id)
    {
        //check login
        AuthHelper::checkLoggedIn();
        //enviamos por parametro la id de la categoria a borrar al modal category
        $destination = $this->travelModel->getAll();
        foreach ($destination as $place) {
            if ($id == $place->id_categoria) {
                $category = $this->categoryModel->getAll();
                $this->view->showCategoryManage($category, "No se puede eliminar la categoría '{$place->paquete}' porque está en uso");
                die();
            }
        }
        $this->categoryModel->remove($id);

        //redirigmos
        header("Location: " . BASE_URL . 'categorymanage');
    }

    //mostrar para editar
    function showEdit($id, $filter)
    {
        //check login
        AuthHelper::checkLoggedIn();

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
        AuthHelper::checkLoggedIn();

        // verifico campos obligatorios
        if (empty($_POST['place']) || empty($_POST['shortdescription']) || empty($_POST['description']) || empty($_POST['value']) || empty($_POST['category'])  || empty($_POST['id'])) {
            $this->view->showError();
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
        AuthHelper::checkLoggedIn();
        // verifico campos obligatorios
        if (empty($_POST['package']) || empty($_POST['aliaspackage']) || empty($_POST['id'])) {
            $this->view->showError();
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
        AuthHelper::checkLoggedIn();

        $destination = $this->travelModel->getAll();
        $category = $this->categoryModel->getAll();
        $this->view->showDestinationManage($category, $destination);
    }

    //mostrar pagina para administrar categorias
    function categoryManage()
    {
        //check login
        AuthHelper::checkLoggedIn();

        $category = $this->categoryModel->getAll();
        $this->view->showCategoryManage($category);
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
