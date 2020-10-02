<?php

class AdminView{

    function showLogin(){
        $smarty = new Smarty();

        $smarty->display('templates/adminlogin.tpl');
    }

    function showAdmin($destination, $category){
        $smarty = new Smarty();

        $smarty->assign('destination', $destination);
        $smarty->assign('category', $category);


        $smarty->display('templates/adminPage.tpl');
    }

    function showError(){
        echo 'Error!';
    }

}
