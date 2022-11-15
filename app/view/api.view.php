<?php 

class apiView{

    public function response($data, $status) {
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
        echo json_encode($data);    
    }
        
    private function _requestStatus($code){
        $status = array(
            200 => "OK",
            201 => "Created",
            400 => "Bad Request", 
            404 => "Not found",
            424 => "Failed Dependency", //No se pudo realizar el método en el recurso porque la acción solicitada dependía de otra acción y esa acción falló
            500 => "Internal Server Error"
        );
        return (isset($status[$code]))? $status[$code] : $status[500];
    }

}

?>