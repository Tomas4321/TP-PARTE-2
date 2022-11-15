<?php

class modelRegister{

function getDB(){
    $db = new PDO('mysql:host=localhost;'.'dbname=db_volkswagen;charset=utf8', 'root', '');
    
    return $db;
}

function getRegister($email){
    $db = $this->getDB();
    $sentencia = $db->prepare('SELECT * FROM registros WHERE email = ?');
    $sentencia->execute([$email]);
    return $sentencia->fetch(PDO::FETCH_OBJ);
    }

}
?> 