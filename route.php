<?php 
include_once "app/controllers/cars.controller.php";
include_once "app/controllers/register.controller.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if(!empty($_GET['action'])){
    $action = $_GET['action'];
}
else{
    $action = 'login';
}

$params = explode("/", $action);

switch ($params[0]){
    case 'login':
        $controller = new registerController();
        $controller->showFormRegister();        
        break;
    case 'validate':
        $controller = new registerController();
        $controller->validateUser();       
        break;
    case 'logout':
        $controller = new registerController();
        $controller->logout();
        break;    
    case 'home':
        $controller = new carsController();
        $controller->showCars();    
        break;
    case 'informacion':
        $controller = new carsController();
        $controller->showSpec($params[1]);   
        break;
    case 'filtro':
        $controller = new carsController();
        $controller->filter();
        break;    
    case 'listado':
        $controller = new carsController();
        $controller->specsXcars();    
        break;    
    case 'add':
        $controller = new carsController();
        $controller->addCars();
        break;
    case 'delete':
        $controller = new carsController();
        $controller->deleteCars($params[1]);
    case 'formedit':
        $controller = new carsController();
        $controller->editCarsForms($params[1]);
        break;
    case 'edit':
        $controller = new carsController();
        $controller->editCars($params[1]);    
        break;        
    case 'addSpecs':
        $controller = new carsController();
        $controller->addSpecs($params[1]);
        break;
    case 'deleteSpecs':
        $controller = new carsController();
        $controller->deleteSpec($params[1]);
        break;    
    case 'formeditSpec':
        $controller = new carsController();
        $controller->formEditSpec($params[1]);
        break;    
    case 'editSpec':
        $controller = new carsController();
        $controller->editsSpec($params[1]); 
        break;
    default:
        echo('404 La pagina no funciona');
    break;
}

?>