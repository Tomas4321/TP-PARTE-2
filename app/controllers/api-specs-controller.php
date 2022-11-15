<?php
include_once "app/models/cars.model.php";
include_once "app/models/specs.model.php";
require_once "app/view/api.view.php";


class ApiSpecsController{

    private $model_specs;
    private $view;

    function __construct(){
        $this->view = new apiView();
        $this->model_specs = new specsModel();
    }

    function getAllSpecs($params = null){
    //Muestro un servicio entero de todas la Especificaciones de cada vehiculo. Ademas ordeno el precio ascendentemente.    
        if(isset($_GET['sort']) && isset($_GET['order'])){    
            if($_GET['sort']=='precio'){
                if($_GET['order']=='ASC'){
                    $specs = $this->model_specs->getSpecsAsc();
                }
                elseif(($_GET['order'])=="DESC"){
                    $specs = $this->model_specs->getSpecDesc();
                }
                else{
                    $specs = $this->model_specs->getSpecs();
                }
            }
        }
        $this->view->response($specs, 200); 
    }
        
        function getOneSpec($params = []){
        //Devuelvo una Especificacion en particular por su ID, si no lo encuentra significa que el id no existe 
            $idSpec = $params[':ID'];
            $spec = $this->model_specs->getSpec($idSpec);
            if($spec){
                $this->view->response($spec, 200);
        
            }
            else{
                $this->view->response("No existe ninguna Especificacion con el ID:$idSpec", 404);
            }
        }

}

?>