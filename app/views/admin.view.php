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
        echo 'Error!';
    }

    function showEdit($category, $destination = null)
    {
        $smarty = new Smarty();

        if ($destination) {

            $smarty->assign('destination', $destination);

            $smarty->assign('category', $category);

            $smarty->display('templates/showEdit.tpl');
        } else {
            $smarty->assign('category', $category);

            $smarty->display('templates/showEditCategory.tpl');
        }
    }

    function showDestinationManage($destination, $category)
    {
        $smarty = new Smarty();
        $smarty->assign('destination', $destination);
        $smarty->assign('category', $category);

        $smarty->display('templates/adminDestination.tpl');
    }

    function showCategoryManage($category)
    {
        $smarty = new Smarty();
        $smarty->assign('category', $category);

        $smarty->display('templates/adminCategory.tpl');
    }
}
