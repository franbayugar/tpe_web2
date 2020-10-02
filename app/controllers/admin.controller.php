<?php

include_once 'app/views/admin.view.php';
include_once 'app/models/travel.model.php';
include_once 'app/models/category.model.php';
include_once 'app/models/user.model.php';


class AdminController {

    private $view;
    private $travelModel;
    private $categoryModel;
    private $userModel;

    function __construct() {
        $this->view = new AdminView();
        $this->travelModel = new TravelModel();
        $this->categoryModel = new CategoryModel();
        $this->userModel = new UserModel();

    }

    function showLogin() {
       // actualizo la vista
       $this->view->showLogin();
    }

    function loginUser(){
        if (!empty($_POST['user']) && !empty($_POST['password'])) {
            $email = $_POST['user'];
            $password = $_POST['password'];
            $user = $this->userModel->getUserByEmail($email);

            if(password_verify($password, $user->password)){
                header("Location: " . BASE_URL . 'administrador'); 

            }
            else{
                echo 'usuario o pas inc';
            }
        }
        else{
            header("HTTP/1.0 403 Forbidden");
        }
    }

    function showAdmin(){
        $destination = $this->travelModel->getAll();
        $category = $this->categoryModel->getAll();

        $this->view->showAdmin($destination, $category);

    }

    function addDestination() {
        $place = $_POST['place'];
        $shortdescription = $_POST['shortdescription'];
        $description = $_POST['description'];
        $value = $_POST['value'];
        $category = $_POST['category'];

        // verifico campos obligatorios
        if (empty($place) || empty($shortdescription) || empty($description) || empty($value) || empty($category))  {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        // inserto la tarea en la DB
        $id = $this->travelModel->insert($place, $shortdescription, $description, $value, $category);

        // redirigimos al listado
        header("Location: " . BASE_URL . '/administrador'); 
    }

    function deleteDestination($id) {
        $this->travelModel->remove($id);
        header("Location: " . BASE_URL . '/administrador'); 
    }


}