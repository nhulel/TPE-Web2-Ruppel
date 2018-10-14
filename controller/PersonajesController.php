<?php
require_once  "./view/PersonajesView.php";
require_once  "./model/PersonajesModel.php";

class PersonajesController
{
  private $view;
  private $model;

  function __construct()
  {
    $this->view = new PersonajesView();
    $this->model = new PersonajesModel();
  }

  function Home(){
      $personajes = $this->model->GetPersonajes();
      $roles = $this->model->GetRoles();
      $this->view->Mostrar($personajes, $roles);
  }

  function Personaje($param){
    if (isset($param)) {
      $personaje = $this->model->GetPersonaje($param);
      $this->view->MostrarPersonaje($personaje);
    }
    else {
      header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
    }
  }

  function InsertarPersonaje(){
    $nombre = $_POST["nombreForm"];
    $descripcion = $_POST["descripcionForm"];
    $id_rol = $_POST["idForm"];

    $this->model->InsertarPersonaje($nombre,$descripcion,$id_rol);

    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

  function BorrarPersonaje($param){
    $this->model->BorrarPersonaje($param[0]);
    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }
}

 ?>
