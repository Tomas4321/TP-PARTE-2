<?php

class registerHelper{

    /* Verifica que el user este logueado y si no lo está
                lo redirige al login                     */

    function Checkloggeds(){
       session_start(); 
        if(!isset($_SESSION['logged'])){
            header("location: ". BASE_URL);
            die();
        }
        
    }
}

?>