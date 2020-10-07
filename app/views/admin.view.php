<?php

class AdminView
{

    function showLogin($error = null)
    {
        $smarty = new Smarty();

        $smarty->assign('error', $error);

        $smarty->display('templates/adminlogin.tpl');
    }

    function showAdmin()
    {
        $smarty = new Smarty();

        $smarty->display('templates/adminPage.tpl');
    }

    function showError()
    {
        $smarty = new Smarty();

        $smarty->display('templates/showError.tpl');
    }

    function showEdit($category, $destination = null)
    {
        $smarty = new Smarty();

        $smarty->assign('destination', $destination);

        $smarty->assign('category', $category);

        $smarty->display('templates/showEdit.tpl');
    }

    function showManage($category, $destination = null)
    {
        $smarty = new Smarty();
        $smarty->assign('destination', $destination);
        $smarty->assign('category', $category);
        $smarty->display('templates/adminManage.tpl');
    }
}
