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
                $_SESSION['username'] = $user->username;
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

    function uniqueRealName($realName, $tempName)
    {
        $filePath = "img/destinations/" . uniqid("", true) . "."
            . strtolower(pathinfo($realName, PATHINFO_EXTENSION));

        move_uploaded_file($tempName, $filePath);

        return $filePath;
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

        //verifico que el archivo insertado sea de la extension correspondiente
        if (
            $_FILES['imageUpload']['type'] == "image/jpg" ||
            $_FILES['imageUpload']['type'] == "image/jpeg" ||
            $_FILES['imageUpload']['type'] == "image/png"
        ) {
            // llamo a la funcion para obtener el real name y luego inserto en la DB
            $realName = $this->uniqueRealName($_FILES['imageUpload']['name'], $_FILES['imageUpload']['tmp_name']);
            $this->travelModel->insert($place, $shortdescription, $description, $value, $realName, $category);
        } else {
            $destination = $this->travelModel->getAll();
            $category = $this->categoryModel->getAll();
            $this->view->showDestinationManage($category, $destination, 'Error: el archivo insertado no es válido');
            die();
        }
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
        $imgRoute = $this->travelModel->getRouteImg($id);
        unlink($imgRoute->imagen);

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

        // verifico que el archivo cargado tenga la extension correcta
        if (
            $_FILES['imageUpload']['type'] == "image/jpg" ||
            $_FILES['imageUpload']['type'] == "image/jpeg" ||
            $_FILES['imageUpload']['type'] == "image/png"
        ) {
            //verifico que esta seteada la ruta a borrar
            if (isset($_POST['deleteImg'])) {
                unlink($_POST['deleteImg']);
            } else {
                //en caso de que no se pida borrar la imagen envío mensaje de error
                $destination = $this->travelModel->getAll();
                $category = $this->categoryModel->getAll();
                $this->view->showDestinationManage($category, $destination, 'Para modificar una imagen se debe eliminar primero la que está precargada');
                die();
            }
            // llamo a la funcion para obtener el real name y luego modifico destino en la DB
            $realName = $this->uniqueRealName($_FILES['imageUpload']['name'], $_FILES['imageUpload']['tmp_name']);
            $this->travelModel->update($place, $shortdescription, $description, $value, $realName, $category, $id);
        } else {
            /* si el archivo no tiene la extension correspondiente 
            chequeo que hayan intentado borrar la imagen pero sin cargar el archivo correspondiente
            */
            if (
                isset($_POST['deleteImg']) || $_FILES['imageUpload']['type'] != "image/jpg" ||
                $_FILES['imageUpload']['type'] != "image/jpeg" ||
                $_FILES['imageUpload']['type'] != "image/png"
            ) {
                $destination = $this->travelModel->getAll();
                $category = $this->categoryModel->getAll();
                header("Location: " . BASE_URL . 'error');
                die();
            }
            //en caso de solo intentar editar algun otro campo que no sea la imagen actualizo el resto de los campos
            $image = $_POST['imagePreUpload'];
            $this->travelModel->update($place, $shortdescription, $description, $value, $image, $category, $id);
        }

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
    //funcion para llamar a la pagina del registro
    function registry()
    {
        //check login
        AuthHelper::checkLogged();
        //llamado a la vista
        $this->view->showRegister();
    }
    /* agrego usuario a la DB*/
    function addUser()
    {
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

        //guardo los valores en variables
        $username = $_POST['user'];
        $email = $_POST['mail'];
        $password = $_POST['password'];

        //compruebo que la contraseña tenga mas de 6 caracteres
        if (strlen($password) < 6) {
            $this->view->showRegister('La contraseña debe ser de 6 o más caracteres');
            die();
        }
        //obtengo los usuarios
        $user = $this->userModel->getUsers($username, $email);
        //compruebo que no se quiera ingresar el mismo usuario o email
        if ($user != null) {
            $this->view->showRegister('El nombre de usuario o e-mail ya existen');
            die();
        }
        //hash de la password y registro de usuario
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $this->userModel->registryUser($username, $email, $hash);
        //el usuario se logea y se envian los datos por post de ingreso
        $this->loginUser();
    }

    //llamado a la funcion para el manejo de usuarios
    function usersPage()
    {
        AuthHelper::checkAdmin();

        $users = $this->userModel->getAll();
        $this->view->showUsersManage($users);
        die();
    }

    //borrado de usuario
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

    //autenticacion de usuarios
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
    /* actualizacion de permisos por parte del administrador */
    function updatePermission()
    {
        AuthHelper::checkAdmin();
        /* se verifica que no se quiera borrar una sesion iniciada y que no haya valores nulos*/
        if (!isset($_POST['permission']) || !isset($_POST['id']) || ($_SESSION['ID_USER'] == $_POST['id'])) {
            $users = $this->userModel->getAll();
            $this->view->showUsersManage($users, 'No se pueden editar los permisos de una cuenta con la sesión iniciada');
            die();
        }
        $permission = $_POST['permission'];
        $id = $_POST['id'];

        //llamado a la db
        $this->userModel->updatePermission($permission, $id);
        header("Location: " . BASE_URL . "usersmanage");
    }

    //funcion para desloguearse
    function logout()
    {
        AuthHelper::logout();
    }
    //mostrar error
    function showError()
    {
        session_start();
        $this->view->showError();
    }
}
