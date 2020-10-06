<?php

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

    function __construct()
    {
        $this->view = new AdminView();
        $this->travelModel = new TravelModel();
        $this->categoryModel = new CategoryModel();
        $this->userModel = new UserModel();
    }

    function showLogin()
    {
        AuthHelper::checkLogged();

        // actualizo la vista
        $this->view->showLogin();
    }

    function loginUser()
    {
        if (!empty($_POST['user']) && !empty($_POST['password'])) {
            $email = $_POST['user'];
            $password = $_POST['password'];
            $user = $this->userModel->getUserByEmail($email);

            if ($user && (password_verify($password, $user->password))) {
                //abro sesion y guardo al usuario
                session_start();
                $_SESSION['ID_USER'] = $user->id;
                $_SESSION['username'] = $user->email;

                header("Location: " . BASE_URL . 'administrador');
            } else {
                $this->view->showLogin('Usuario o contraseña incorrectos');
            }
        } else {
            $this->view->showLogin('Faltan datos obligatorios');
        }
    }

    function showAdmin()
    {
        AuthHelper::checkLoggedIn();

        $this->view->showAdmin();
    }


    function addDestination()
    {
        AuthHelper::checkLoggedIn();

        $place = $_POST['place'];
        $shortdescription = $_POST['shortdescription'];
        $description = $_POST['description'];
        $value = $_POST['value'];
        $category = $_POST['category'];

        // verifico campos obligatorios
        if (empty($place) || empty($shortdescription) || empty($description) || empty($value) || empty($category)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        // inserto la tarea en la DB
        $id = $this->travelModel->insert($place, $shortdescription, $description, $value, $category);

        // redirigimos al listado
        header("Location: " . BASE_URL . 'destinationmanage');
    }

    function addCategory()
    {
        AuthHelper::checkLoggedIn();

        $package = $_POST['package'];
        $aliaspackage = $_POST['aliaspackage'];


        // verifico campos obligatorios
        if (empty($package) || empty($aliaspackage)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        // inserto la tarea en la DB
        $this->categoryModel->insert($package, $aliaspackage);

        // redirigimos al listado
        header("Location: " . BASE_URL . 'categorymanage');
    }

    function deleteDestination($id)
    {
        AuthHelper::checkLoggedIn();

        $this->travelModel->remove($id);
        header("Location: " . BASE_URL . 'destinationmanage');
    }

    function deleteCategory($id)
    {
        AuthHelper::checkLoggedIn();

        $this->categoryModel->remove($id);
        header("Location: " . BASE_URL . 'categorymanage');
    }

    function showEdit($id, $filter)
    {
        AuthHelper::checkLoggedIn();

        if ($filter == 'destination') {
            $destination = $this->travelModel->getOne($id);
            $category = $this->categoryModel->getAll();

            $this->view->showEdit($category, $destination);
        }
        if ($filter == 'category') {

            $category = $this->categoryModel->getOne($id);
            $this->view->showEdit($category);
        }
    }

    function updateDestination()
    {
        AuthHelper::checkLoggedIn();

        $place = $_POST['place'];
        $shortdescription = $_POST['shortdescription'];
        $description = $_POST['description'];
        $value = $_POST['value'];
        $category = $_POST['category'];
        $id = $_POST['id'];

        // verifico campos obligatorios
        if (empty($place) || empty($shortdescription) || empty($description) || empty($value) || empty($category)  || empty($id)) {
            $this->view->showLogin('Faltan datos obligatorios');
            die();
        }

        // inserto la tarea en la DB
        $this->travelModel->update($place, $shortdescription, $description, $value, $category, $id);

        // redirigimos al listado
        header("Location: " . BASE_URL . 'destinationmanage');
    }

    function destinationManage()
    {
        AuthHelper::checkLoggedIn();

        $destination = $this->travelModel->getAll();
        $category = $this->categoryModel->getAll();
        $this->view->showDestinationManage($destination, $category);
    }

    function categoryManage()
    {
        AuthHelper::checkLoggedIn();

        $category = $this->categoryModel->getAll();
        $this->view->showCategoryManage($category);
    }

    function updateCategory()
    {
        AuthHelper::checkLoggedIn();

        $package = $_POST['package'];
        $aliaspackage = $_POST['aliaspackage'];
        $id = $_POST['id'];


        // verifico campos obligatorios
        if (empty($package) || empty($aliaspackage) || empty($id)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        // inserto la tarea en la DB
        $this->categoryModel->update($package, $aliaspackage, $id);

        // redirigimos al listado
        header("Location: " . BASE_URL . 'categorymanage');
    }
    function logout()
    {
        AuthHelper::logout();
    }
}
