<?php
require_once "libs/Router.php";
require_once "app/controllers/api-cars-controller.php";
require_once "app/controllers/api-specs-controller.php";

// crea el router

$router = new Router();

// defino la tabla de ruteo. AUTOS

//TRAER TODOS LOS AUTOS 
$router->addRoute('cars', 'GET', 'apiCarsController', 'getAllCars');

//TRAER AUTOS POR ID
$router->addRoute('cars/:ID', 'GET', 'apiCarsController', 'getOneCar');

//INSERTAR VEHICULO
$router->addRoute('cars', 'POST', 'apiCarsController', 'addCarsApi');

//EDITAR VEHICULO POR ID
$router->addRoute('cars/:ID', 'PUT', 'apiCarsController', 'editCarApi');

//BORRAR VEHICULO POR ID
$router->addRoute('cars/:ID', 'DELETE', 'apiCarsController', 'DeleteCars');


//RUTEO TABLA DE ESPECIFICACIONES

//TRAER TODAS LAS ESPECIFICACIONES
$router->addRoute('specs', 'GET', 'ApiSpecsController', 'getAllSpecs');

//TRAER ESPECIFICACIONES POR ID
$router->addRoute('specs/:ID', 'GET', 'ApiSpecsController', 'getOneSpec');


$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);  // ejecuta la ruta (sea cual sea)






?>