<?php

class AdminView
{

    //mostrar login - se pasa por parametro un error en caso de haber alguno
    function showLogin($error = null)
    {
        $smarty = new Smarty();
        $smarty->assign('error', $error);
        $smarty->display('templates/adminlogin.tpl');
    }

    //mostrar pagina de administrador principal
    function showAdmin()
    {
        $smarty = new Smarty();
        $smarty->display('templates/adminPage.tpl');
    }

    //mostrar error 
    function showError()
    {
        $smarty = new Smarty();
        $smarty->display('templates/showError.tpl');
    }

    //funcion que llama al modal para editar - se maneja por ajax
    function showEdit($category, $destination = null)
    {
        $smarty = new Smarty();
        $smarty->assign('destination', $destination);
        $smarty->assign('category', $category);
        $smarty->display('templates/showEdit.tpl');
    }

    //mostrar pagina para administrar categorias
    function showCategoryManage($category, $error = null)
    {
        $smarty = new Smarty();
        $smarty->assign('category', $category);
        $smarty->assign('error', $error);
        $smarty->display('templates/adminCategory.tpl');
    }

    //mostrar pagina para administrar destino
    function showDestinationManage($category, $destination, $error = null)
    {
        $smarty = new Smarty();
        $smarty->assign('destination', $destination);
        $smarty->assign('error', $error);
        $smarty->assign('category', $category);
        $smarty->display('templates/adminDestination.tpl');
    }

    function showUsersManage($users)
    {
        $smarty = new Smarty();
        $smarty->assign('users', $users);
        $smarty->display('templates/adminUsers.tpl');
    }

    function showRegister($error = null)
    {
        $smarty = new Smarty();
        $smarty->assign('error', $error);
        $smarty->display('templates/register.tpl');
    }
}
