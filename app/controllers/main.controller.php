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

   //instanciamos los objetos
   function __construct()
   {
      $this->view = new MainView();
      $this->travelModel = new TravelModel();
      $this->categoryModel = new CategoryModel();
      session_start();
   }

   //mostrar el home
   function showHome()
   {
      // actualizo la vista
      $destination = $this->travelModel->getByPagination(0, 3);
      $category = $this->categoryModel->getAll();
      $buttonsPagination = 3;

      $this->view->showHome($destination, $category, $buttonsPagination);
   }

   function filterByPagination($pagination)
   {
      // actualizo la vista
      $destination = $this->travelModel->getByPagination($pagination, 3);
      $pagination = $pagination + 3;
      if ($destination != null) {
         $this->view->filter($destination, 0, $pagination, 0);
      } else {
         $this->view->showError('Error: elemento no disponible');
      }
   }

   function paginationSearch($params)
   {
      $minprice = $params[1];
      $maxprice = $params[2];
      $pagination = $params[3];

      $destination = $this->travelModel->getByPaginationSearch($minprice, $maxprice, $pagination, 3);
      if ($destination != null) {
         $pagination = $pagination + 3;
         $this->view->filter($destination, 0, $pagination, 1);
      } else {
         $this->view->showError('No tenemos más destinos en ese rango de precios');
      }
   }

   //mostrar nosotros
   function showAbout()
   {
      // actualizo la vista

      $this->view->showAbout();
   }

   //filtro por categoria realizado con ajax
   function filter($id)
   {
      // actualizo la vista
      // si llega un id distinto de 0 signifca que se pidio por filtro
      if ($id != 0) {
         $destination = $this->travelModel->getByCategory($id);
         if ($destination != null) {
            $this->view->filter($destination, $id);
         } else {
            //si no trae nada mostramos que aun no tenemos cargada esa categoria
            $this->view->showError('Aún no tenemos esta categoría disponible para vos');
         }
      }
      //si llega id 0 se muestra todo lo que hay en la base de datos de destino
      else {
         $destination = $this->travelModel->getAll();
         $this->view->filter($destination, $id);
      }
   }

   //funcion para ver detalles 
   function showMore($id)
   {

      $destination = $this->travelModel->getOne($id);
      if ($destination != null) {
         $this->view->showCommentsCSR($destination);
      } else {
         $this->showError();
         die();
      }
   }
   function showError()
   {
      $this->view->showError();
   }
}
