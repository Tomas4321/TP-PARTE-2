<?php
include_once "app/models/register.model.php";
include_once "app/view/register.view.php";
include_once "app/helpers/register.helper.php";

//include_once "app/view/cars.view.php";
//tomas123

class registerController{

    private $model_register;
    private $view_register;
    private $authHelper;

    function __construct(){
        $this->model_register = new modelRegister();
        $this->view_register = new viewRegister();
        $this->authHelper = new registerHelper();

    }

function showFormRegister(){
    $this->view_register->showFormRegister();
}    

function validateUser(){
    //Tomo el name del form
    
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    //busco el email del user
    $user = $this->model_register->getRegister($email);

    //Si el usuario existe y la contraseñas coinciden 
    if($user && password_verify($contraseña, $user->contraseña)){
        session_start();
        $_SESSION['id_registros'] = $user->id_registros; 
        $_SESSION['email'] = $user->email;
        $_SESSION['logged'] = true;
        

        header("location: " . BASE_URL . "home");    
    }else{
        $this->view_register->showFormRegister("El email o la contraseña no son correctas!");
    }

}

function logout(){
   $this->authHelper->Checkloggeds(); 
   session_start();
   session_destroy();
   header("location: " .BASE_URL); 
}

}




?>