<?php
require_once('libs/smarty/libs/Smarty.class.php');

class MainView
{
    function showHome($destination, $category)
    {
        $smarty = new Smarty();

        $smarty->assign('destination', $destination);
        $smarty->assign('category', $category);
        $smarty->assign('checkId', '0');


        $smarty->display('templates/homePage.tpl');
    }

    function showAbout()
    {
        $smarty = new Smarty();

        $smarty->display('templates/aboutPage.tpl');
    }

    function filter($destination, $checkId)
    {
        $smarty = new Smarty();

        $smarty->assign('destination', $destination);

        $smarty->assign('checkId', $checkId);

        $smarty->display('templates/homeFilter.tpl');
    }

    function showMore($destination)
    {
        $smarty = new Smarty();

        $smarty->assign('destination', $destination);

        $smarty->display('templates/showDetail.tpl');
    }

    function showError($error = null)
    {
        $smarty = new Smarty();
        if ($error) {
            $smarty->assign('error', $error);

            $smarty->display('templates/error.tpl');
        } else {
            $smarty->display('templates/showError.tpl');
        }
    }
}
