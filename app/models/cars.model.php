<?php

class carsModel{

function getDB(){
    $db = new PDO('mysql:host=localhost;'.'dbname=db_volkswagen;charset=utf8', 'root', '');
    
    return $db;
}

function getCars(){
  $db = $this->getDB();
  $sentencia = $db->prepare('SELECT * FROM autos'); 
  $sentencia->execute();

  $cars = $sentencia->fetchAll(PDO::FETCH_OBJ);
  
  return $cars;

}

function getCar($id){
  $db = $this->getDB();

  $sentencia = $db->prepare('SELECT * FROM autos WHERE id = ?');
  $sentencia->execute([$id]);
  $car = $sentencia->fetch(PDO::FETCH_OBJ);
  
  return $car;

}


function insertCars($vehiculos, $forma_de_pago, $contacto, $categoria){
  $db = $this->getDB();
  $sentencia = $db->prepare('INSERT INTO autos(vehiculos, forma_de_pago, contacto, categoria) VALUES (?, ?, ?, ?)');
  $sentencia->execute([$vehiculos, $forma_de_pago, $contacto, $categoria]);
}

function delete($id){
  $db = $this->getDB();

  $sentencia = $db->prepare('DELETE FROM autos WHERE id = ?');
  $sentencia->execute([$id]);
}


 function edit($vehiculos, $forma_de_pago, $contacto, $categoria, $id){
  $db = $this->getDB();
  $sentencia = $db->prepare("UPDATE autos SET vehiculos=?, forma_de_pago=?, contacto=?, categoria=?  WHERE id = ?");
  $sentencia->execute([$vehiculos, $forma_de_pago, $contacto, $categoria, $id]);
}

function filter(){
  $db = $this->getDB();

  //SELECT `vehiculos` FROM autos;
  $sentencia = $db->prepare('SELECT vehiculos FROM autos');
  $sentencia->execute();
  $Filtercars = $sentencia->fetchAll(PDO::FETCH_OBJ);
  
  return $Filtercars;
  
}


}
?>