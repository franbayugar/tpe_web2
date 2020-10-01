<?php
include_once 'app/views/main.view.php';
include_once 'app/models/travel.model.php';
include_once 'app/models/category.model.php';


class MainController {

    private $view;
    private $travelModel;
    private $categoryModel;


    function __construct() {
        $this->view = new MainView();
        $this->travelModel = new TravelModel();
        $this->categoryModel = new CategoryModel();
    }

    function showHome() {
       // actualizo la vista
       $destination = $this->travelModel->getAll();
       $category = $this->categoryModel->getAll();

       $this->view->showHome($destination, $category);
    }

    
    function showAbout() {
        // actualizo la vista
 
        $this->view->showAbout();
     }

    
    function filter($id) {
        // actualizo la vista
        $destination = $this->travelModel->getAll();
        $category = $this->categoryModel->getAll();
        
        $this->view->filter($destination, $category, $id);
     }

     function showMore($id){
        $destination = $this->travelModel->getAll();
        $this->view->showMore($destination, $id);

     }


}