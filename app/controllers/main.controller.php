<?php
include_once 'app/views/main.view.php';
include_once 'app/models/travel.model.php';
include_once 'app/models/category.model.php';
include_once 'helpers/auth.helper.php';



class MainController
{

   private $view;
   private $travelModel;
   private $categoryModel;


   function __construct()
   {
      $this->view = new MainView();
      $this->travelModel = new TravelModel();
      $this->categoryModel = new CategoryModel();
      session_start();
   }

   function showHome()
   {
      // actualizo la vista
      $destination = $this->travelModel->getAll();
      $category = $this->categoryModel->getAll();

      $this->view->showHome($destination, $category);
   }


   function showAbout()
   {
      // actualizo la vista

      $this->view->showAbout();
   }


   function filter($id)
   {
      // actualizo la vista
      if ($id != 0) {
         $destination = $this->travelModel->getByCategory($id);
         if ($destination != null) {
            $this->view->filter($destination, $id);
         } else {
            echo 'algo salio mal';
         }
      } else {
         $destination = $this->travelModel->getAll();
         $this->view->filter($destination, $id);
      }
   }

   function showMore($id)
   {
      $destination = $this->travelModel->getOne($id);
      if ($destination != null) {
         $this->view->showMore($destination);
      } else {
         echo 'error';
         die();
      }
   }
}
