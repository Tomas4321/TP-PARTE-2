<?php

require_once('libs/Smarty.class.php');

class viewRegister{

    private $smarty;

    function __construct(){
        $this->smarty = new smarty();
    }

function showFormRegister($error = null){
    $this->smarty->assign('basehref', BASE_URL);
    $this->smarty->assign("error", $error);
    $this->smarty->display("templates/form.register.tpl");
}


}


?>