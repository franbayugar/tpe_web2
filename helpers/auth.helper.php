<?php

class AuthHelper
{
    public function __construct()
    {
    }

    //se chequeal el login
    public static function checkLoggedIn()
    {
        session_start();
        if (!isset($_SESSION['ID_USER'])) {
            header("Location: " . BASE_URL . 'login');
            return false;
        } else {
            return true;
        }
    }

    //se chequea el login en la pagina de login, si esta logeado deriva a administrador
    public static function checkLogged()
    {
        session_start();
        if (isset($_SESSION['ID_USER'])) {
            header("Location: " . BASE_URL . 'administrador');
            return false;
        } else {
            return true;
        }
    }

    //funcion para desloguear
    public static function logout()
    {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . 'login');
    }
}
