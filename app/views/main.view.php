<?php
require_once('libs/smarty/libs/Smarty.class.php');

class MainView
{
    //funcion para mostrar el home
    function showHome($destination, $category)
    {
        $smarty = new Smarty();

        $smarty->assign('destination', $destination);
        $smarty->assign('category', $category);
        $smarty->assign('checkId', '0');


        $smarty->display('templates/homePage.tpl');
    }

    //mostrar pagina nosotros
    function showAbout()
    {
        $smarty = new Smarty();

        $smarty->display('templates/aboutPage.tpl');
    }

    //filtro - trabaja con ajax y recibe por parametro un checkid para verificar en smarty q mostrar
    function filter($destination, $checkId)
    {
        $smarty = new Smarty();
        $smarty->assign('destination', $destination);
        $smarty->assign('checkId', $checkId);
        $smarty->display('templates/homeFilter.tpl');
    }

    //ver detalle de cada producto
    function showMore($destination)
    {
        $smarty = new Smarty();
        $smarty->assign('destination', $destination);
        $smarty->display('templates/showMore.tpl');
    }

    function showCommentsCSR($destination)
    {
        $smarty = new Smarty();
        $smarty->assign('destination', $destination);
        $smarty->display('templates/commentsList_csr.tpl');
    }

    //mostrar error en filtro si llega por parametro o en alguna pagina en general si llega vacio
    function showError($error = null)
    {
        $smarty = new Smarty();
        if ($error) {
            $smarty->assign('error', $error);
            $smarty->display('templates/error-filter.tpl');
        } else {
            $smarty->display('templates/showError.tpl');
        }
    }
}
