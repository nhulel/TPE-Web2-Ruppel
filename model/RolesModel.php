<?php

class RolesModel
{
  private $db;

  function __construct()
  {
    $this->db = $this->Connect();
  }

  function Connect(){
    return new PDO('mysql:host='.HOST.'; dbname='.DBNOMBRE.';charset=utf8', USER, PASS);
  }

  function GetRoles(){
    $sentencia = $this->db->prepare("select * from rol");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function GetRol($idRol){
    $sentencia = $this->db->prepare("select * from rol where id=?");
    $sentencia->execute($idRol);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function InsertarRol($nombre,$descripcion){
    $sentencia = $this->db->prepare("INSERT INTO rol(nombre, descripcion) VALUES(?,?)");
    $sentencia->execute(array($nombre,$descripcion));
  }

  function BorrarRol($idRol){
    $sentencia = $this->db->prepare("delete from rol where id=?");
    $sentencia->execute(array($idRol));
    $sentencia = $this->db->prepare("delete from personaje where id_rol=?");
    $sentencia->execute(array($idRol));
  }

  function GuardarEditarRol($nombre,$descripcion,$id){
    $sentencia = $this->db->prepare("update rol set nombre = ?, descripcion = ? where id=?");
    $sentencia->execute(array($nombre,$descripcion,$id));
  }

}


?>
