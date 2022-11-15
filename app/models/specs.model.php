<?php

class specsModel{

function getDB(){
  $db = new PDO('mysql:host=localhost;'.'dbname=db_volkswagen;charset=utf8', 'root', '');
    
  return $db;
}

function getSpecs(){
  $db = $this->getDB();
  $sentencia = $db->prepare('SELECT * FROM especificaciones');
  $sentencia->execute();
  
  $specs = $sentencia->fetchAll(PDO::FETCH_OBJ);

  return $specs;
}


function getSpecsAsc(){
  $db = $this->getDB();
  $sentencia = $db->prepare('SELECT * FROM especificaciones ORDER BY precio  ASC');
  $sentencia->execute();
  
  $specs = $sentencia->fetchAll(PDO::FETCH_OBJ);

  return $specs;
}

function getSpecDesc(){
  $db = $this->getDB();
  $sentencia = $db->prepare('SELECT * FROM especificaciones ORDER BY precio DESC');
  $sentencia->execute();
  
  $specs = $sentencia->fetchAll(PDO::FETCH_OBJ);

  return $specs;
}

function delete($id){
  $db = $this->getDB();

  $sentencia = $db->prepare('DELETE FROM especificaciones WHERE id_usuarios = ?');
  $sentencia->execute([$id]);

}


function insertSpecs($cv, $precio, $fabricacion, $id_usuarios){
  $db = $this->getDB();

  $sentencia = $db->prepare('INSERT INTO especificaciones(cv, precio, fabricacion, id_usuarios) VALUES (?, ?, ?,?)');
  $sentencia->execute([$cv, $precio, $fabricacion, $id_usuarios]);
}


function editSpec($cv, $precio, $fabricacion, $id_usuarios){
  $db = $this->getDB();

  $sentencia = $db->prepare("UPDATE especificaciones SET cv=?, precio=?, fabricacion=?  WHERE id_usuarios = ?");
  $sentencia->execute([$cv, $precio, $fabricacion, $id_usuarios]);
}


function getSpec($id_usuarios){
  $db = $this->getDB();

  $sentencia = $db->prepare('SELECT * FROM especificaciones WHERE id_usuarios = ?');
  $sentencia->execute([$id_usuarios]);
  $spec = $sentencia->fetch(PDO::FETCH_OBJ);

  return $spec;
}


}

?>