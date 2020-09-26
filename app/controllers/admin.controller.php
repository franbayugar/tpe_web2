<?php

include_once 'app/views/admin.view.php';
include_once 'app/models/travel.model.php';

class AdminController {

    private $view;
    private $model;

    function __construct() {
        $this->view = new AdminView();
        $this->model = new TravelModel();
    }

    function showLogin() {
       // actualizo la vista
       $this->view->showLogin();
    }

    function checkLogin(){
        if (!empty($_POST['user']) && !empty($_POST['password'])) {
            $user = $_POST['user'];
            $password = $_POST['password'];
            if($user == 'admin' && $password == 'admin'){
                $this->showAdmin();
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
        $destination = $this->model->getAll();
        $this->view->showAdmin($destination);

    }

    function addDestination() {
        $destino = $_POST['destino'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $fecha = $_POST['fecha'];
        $transporte = $_POST['transporte'];

        // verifico campos obligatorios
        if (empty($destino) || empty($descripcion) || empty($precio) || empty($fecha)|| empty($transporte))  {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        // inserto la tarea en la DB
        $id = $this->model->insert($destino, $descripcion, $precio, $fecha, $transporte);

        // redirigimos al listado
        header("Location: " . BASE_URL); 
    }

    function deleteDestination($id) {
        $this->model->remove($id);
        header("Location: " . BASE_URL); 
    }


}