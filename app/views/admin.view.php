<?php

class AdminView{

    function showLogin(){
        $smarty = new Smarty();

        $smarty->display('templates/adminlogin.tpl');
    }

    function showAdmin($destination){
        $smarty = new Smarty();

        $smarty->assign('destination', $destination);

        $smarty->display('templates/adminPage.tpl');
    }

    function showError(){
        echo 'Error!';
    }

}
