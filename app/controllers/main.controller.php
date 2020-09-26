<?php
include_once 'app/views/home.view.php';
include_once 'app/models/travel.model.php';

class MainController {

    private $view;
    private $model;

    function __construct() {
        $this->view = new HomeView();
        $this->model = new TravelModel();
    }

    function showHome() {
       // actualizo la vista
       $destination = $this->model->getAll();

       $this->view->showHome($destination);
    }


}