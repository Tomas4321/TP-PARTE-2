<?php
include_once "app/models/cars.model.php";
include_once "app/models/specs.model.php";
require_once "app/view/api.view.php";

class apiCarsController{

    private $model_cars;
    private $view;

    function __construct(){
        $this->view = new apiView();
        $this->model_cars = new carsModel();
    }
    
    function getAllCars($params = null){
    //Filtro todos los autos     
        if(isset($_GET['filter'])){          
            if($_GET['filter']=='vehiculos'){
                $this->filterCars(); 
            }
            else{
                $this->view->response("Error en la peticion", 404);
            }
            
        }
        else{
            $cars = $this->model_cars->getCars();
            $this->view->response($cars, 200);
        }
    }

    function getOneCar($params = []){
        /*Devuelvo un vehiculo en particular por su ID, si no lo encuentra significa que el id no existe */
        $idCar = $params[':ID'];
        $car = $this->model_cars->getCar($idCar);
        if($car){
            $this->view->response($car, 200); 
        }
        else{
            $this->view->response(" la tarea con el id = $idCar no existe", 404);
        }
    }


    function addCarsApi($params = null){
        /* Agrego un nuevo vehiculo manualmente, en caso de tener datos incompletos el envio no se lleva a cabo */
        $body = $this->getBody();
    
        if(empty($body->vehiculos)|| empty($body->forma_de_pago) || empty($body->contacto) || empty($body->categoria)){
            $this->view->response(" Faltan completar datos", 400);
        }
        else{ 
            $this->model_cars->insertCars($body->vehiculos, $body->forma_de_pago, $body->contacto, $body->categoria);
            $this->view->response(" Se creo exitosamente!", 201);
        }
    }

    function editCarApi($params = []){
        /*Edito un vehiculo en particular por su ID, primero pregunto si el vehiculo existe y despues lo edito. Si no lo encuentra el ID no existe  */
        $idEditcar = $params[':ID'];
        $car = $this->model_cars->getCar($idEditcar);
        $body = $this->getBody();
        if($car){
            $this->view->response($car, 200); 
    
            if(empty($body->vehiculos)|| empty($body->forma_de_pago) || empty($body->contacto) || empty($body->categoria)){
                $this->view->response(" Faltan completar datos", 424);
            }
            else{
                $this->model_cars->edit($body->vehiculos, $body->forma_de_pago, $body->contacto, $body->categoria, $idEditcar);
                $this->view->response(" Se modifico exitosamente!", 201);
            }
    
        }    
        else{
            $this->view->response(" No existe el Vehiculo con el ID: $idEditcar", 404);
        }         
    }

    function DeleteCars($params = []){
    //Elimino un Vehiculo en particular por un ID, pregunto si existe y si esta lo elimino. Si no dara un error que no existe    
        $idDeletecar = $params[':ID'];
        $car = $this->model_cars->getCar($idDeletecar);
        if($car){
            $this->model_cars->delete($idDeletecar);
            $this->view->response($car, 200);
        }
        else{
            $this->view->response("No existe el Vehiculo con el ID: $idDeletecar", 404);
        }
    }

    function filterCars(){
    //Filtro todos los vehiculos. Pregunto si lo vehiculos existen o no    
    $filterCar = $this->model_cars->filter();
        if($filterCar){
            $this->view->response($filterCar, 200);
        }   
        else{
            $this->view->response("No existe un vehiculo con el Nombre : $filterCar", 404);
        }          
    }


    private function getBody(){
    /* Devuelvo el body con los datos enviados manualmente */
    $bodyString = file_get_contents("php://input");
    return json_decode($bodyString);

    }

}

?>