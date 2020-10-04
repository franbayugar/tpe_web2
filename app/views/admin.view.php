<?php

class AdminView{

    function showLogin(){
        $smarty = new Smarty();

        $smarty->display('templates/adminlogin.tpl');
    }

    function showAdmin(){
        $smarty = new Smarty();

        $smarty->display('templates/adminPage.tpl');
    }

    function showError(){
        echo 'Error!';
    }

    function showEdit($destination, $category){
        $smarty = new Smarty();

        $smarty->assign('destination', $destination);

        $smarty->assign('category', $category);

        $smarty->display('templates/showEdit.tpl');
    }
    
    function showDestinationManage($destination, $category){
        $smarty = new Smarty();
        $smarty->assign('destination', $destination);
        $smarty->assign('category', $category);

        $smarty->display('templates/adminDestination.tpl');
    }
}
