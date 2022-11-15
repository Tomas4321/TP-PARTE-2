<?php
include_once "app/models/cars.model.php";
include_once "app/models/specs.model.php";
include_once "app/helpers/register.helper.php";

include_once "app/view/cars.view.php";


class carsController{
    private $model_cars;
    private $view;
    private $model_specs;
    private $RegisterHelper;

    function __construct(){
    $this->model_cars = new carsModel();
    $this->view = new carsView();
    $this->model_specs = new specsModel();
    $this->RegisterHelper = new registerHelper();
    //$this->RegisterHelper->Checkloggeds(); 
    }


function showCars(){
   session_start();
   $cars = $this->model_cars->getCars();

   $this->view->showCars($cars);

}

function showSpec($id){
    session_start();
    $spec = $this->model_specs->getSpec($id);

    $this->view->showSpec($id, $spec);
}

function filter(){ 
    session_start();  
    $cars = $this->model_cars->getCars();

    $this->view->filter($cars);
}

function specsXcars(){
    session_start();
    $cars = $this->model_cars->getCars();
    $specs = $this->model_specs->getSpecs();

    $this->view->specsXcars($cars, $specs);
}

function addCars(){
    $this->RegisterHelper->Checkloggeds();
    $vehiculos = $_POST['vehiculos'];
    $forma_de_pago = $_POST['forma_de_pago'];
    $contacto = $_POST['contacto'];
    $categoria = $_POST['categoria'];

    $this->model_cars->insertCars($vehiculos, $forma_de_pago, $contacto, $categoria);
    header("location: ". BASE_URL. "home");

 
}

function deleteCars($id){
    $this->RegisterHelper->Checkloggeds();
    $this->model_specs->delete($id);
    
    $this->model_cars->delete($id);
    
    $this->view->deleteCars($id);
    header("location: ". BASE_URL. "home");
}


function editCars($id){
    $this->RegisterHelper->Checkloggeds();
        $vehiculos = $_POST['vehiculos'];
        $forma_de_pago = $_POST['forma_de_pago'];
        $contacto = $_POST['contacto'];
        $categoria = $_POST['categoria'];

        $this->model_cars->edit($vehiculos, $forma_de_pago, $contacto, $categoria, $id);
        header("location: ". BASE_URL. "home");
}

function editCarsForms($id){
    $this->RegisterHelper->Checkloggeds();
    $this->view->editCarsForms($id);
    
}

function addSpecs($id_usuarios){
    $this->RegisterHelper->Checkloggeds();
    $cv = $_POST['cv'];
    $precio = $_POST['precio'];
    $fabricacion = $_POST['fabricacion'];
    $this->model_specs->insertSpecs($cv, $precio, $fabricacion, $id_usuarios);
    header("location: ". BASE_URL. "informacion/$id_usuarios");
}

function deleteSpec($id){
    $this->RegisterHelper->Checkloggeds();
    $this->model_specs->delete($id);

    header("location: ". BASE_URL. "informacion/$id");
}

function editsSpec($id_usuarios){
    $this->RegisterHelper->Checkloggeds();
    $cv = $_POST['cv'];
    $precio = $_POST['precio'];
    $fabricacion = $_POST['fabricacion'];

    $this->model_specs->editSpec($cv, $precio, $fabricacion, $id_usuarios);
    header("location: ". BASE_URL. "informacion/$id_usuarios");
}

function formEditSpec($id_usuarios){
    $this->RegisterHelper->Checkloggeds();
    $this->view->formEditSpec($id_usuarios);
}

}
?>