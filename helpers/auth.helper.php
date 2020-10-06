<?php

class AuthHelper
{
    public function __construct()
    {
    }

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

    public static function checkLoggedOtherPages()
    {
        session_start();
        if (!isset($_SESSION['ID_USER'])) {
            return false;
        } else {
            return true;
        }
    }

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



    public static function logout()
    {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . 'login');
    }
}
