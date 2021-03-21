<?php

  include "db.php";

  class usuarios extends db {

    function __construct() {
      parent::__construct();
    }

    //Funciones de CRUD
    //Select
    public function getequipo($nombre){
      $sql = "SELECT * FROM equipos WHERE Nombre='".$nombre."';";
      $resultado = $this->realizarQuery($sql);
      if($resultado!=null){
        $usuario=$resultado->fetch_assoc();
        $json_equipo = json_encode($usuario);
        return $json_equipo;
      }
      else{
        return null;
      }
    }

    //Insert
    public function insertUsuario($jsonUsuarios){
      $arrayDatos = json_decode($jsonUsuarios,true);
      $sql = "INSERT INTO equipos (Nombre,Ciudad,Conferencia) VALUES ('".$arrayDatos['Nombre']."','".$arrayDatos['Ciudad']."',".$arrayDatos['Conferencia'].");";

      $resultado = $this->realizarQuery($sql);
      return $resultado;
    }


    //Funciones de CRUD
    //En este caso sólo gestionamos el update
    public function updateUsuarios($jsonUsuarios){
      $arrayDatos = json_decode($jsonUsuarios,true);
      $sql = "UPDATE equipos set Nombre='".$arrayDatos['Nombre']."',
        Ciudad='".$arrayDatos['Ciudad']."',
            Conferencia=".$arrayDatos['Conferencia']." WHERE Division=".$arrayDatos['Division'].";";

      $resultado = $this->realizarQuery($sql);
      return $resultado;
    }

    //Borramos un usuario por su Nombre
    public function borrarUsuario($jsonUsuarios){
      $arrayDatos = json_decode($jsonUsuarios,true);
      $sql = "DELETE FROM equipos WHERE Nombre='".$arrayDatos['Nombre']."';";
      $resultado = $this->realizarQuery($sql);
      return $resultado;
    }
  }
?>