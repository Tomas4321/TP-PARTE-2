<?php 
require_once('libs/Smarty.class.php');

class carsView{

    private $smarty;

    public function __construct() {
        $this->smarty = new smarty(); 
    }


function showCars($cars){
    $this->smarty->assign('basehref', BASE_URL);
    $this->smarty->assign("cars", $cars);
    $this->smarty->assign("titulo", "Volkswagen oficial");
    $this->smarty->display("templates/cars.tpl");
}

function showSpec($id, $spec){
    $this->smarty->assign('basehref', BASE_URL);
    $this->smarty->assign("id", $id);
    $this->smarty->assign("spec", $spec);
    $this->smarty->assign("especificaciones", "Especificaciones del vehiculo");
    $this->smarty->display("templates/spec.tpl"); 
}

function filter($cars){
    $this->smarty->assign('basehref', BASE_URL);
    $opciones = $_POST['opciones']; 
    $this->smarty->assign("opciones", $opciones);
    $this->smarty->assign("cars", $cars);
    $this->smarty->display("templates/form.filter.tpl");
}

function specsXcars($cars, $specs){
    $this->smarty->assign('basehref', BASE_URL);
    $this->smarty->assign("cars", $cars);
    $this->smarty->assign("specs", $specs);
    $this->smarty->display("templates/specs.cars.tpl");
}

function deleteCars($id){
    $this->smarty->assign('basehref', BASE_URL);
    $this->smarty->assign("id", $id);
    $this->smarty->display("templates/specs.cars.tpl");
}

function editCarsForms($id){
    $this->smarty->assign('basehref', BASE_URL);
    $this->smarty->assign("id", $id);
    $this->smarty->display("templates/edit.cars.tpl");
}

function formEditSpec($id_usuarios){
    $this->smarty->assign('basehref', BASE_URL);
    $this->smarty->assign("id_usuarios", $id_usuarios);
    $this->smarty->display("templates/edit.spec.tpl");

}

}


?>
