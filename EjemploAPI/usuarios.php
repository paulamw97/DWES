<?php

  include "db.php";

  class usuarios extends db {

    function __construct() {
      parent::__construct();
    }

    //Funciones de CRUD
    //Select
    public function getUsuario($nombre){
      $sql = "SELECT * FROM usuario WHERE nombre='".$nombre."';";
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
      $sql = "INSERT INTO usuario (nombre,apellidos,edad) VALUES ('".$arrayDatos['nombre']."','".$arrayDatos['apellidos']."',".$arrayDatos['edad'].");";

      $resultado = $this->realizarQuery($sql);
      return $resultado;
    }


    //Funciones de CRUD
    //En este caso sólo gestionamos el update
    public function updateUsuarios($jsonUsuarios){
      $arrayDatos = json_decode($jsonUsuarios,true);
      $sql = "UPDATE usuario set nombre='".$arrayDatos['nombre']."',
        apellidos='".$arrayDatos['apellidos']."',
            edad=".$arrayDatos['edad']." WHERE id=".$arrayDatos['id'].";";

      $resultado = $this->realizarQuery($sql);
      return $resultado;
    }

    //Borramos un usuario por su nombre
    public function borrarUsuario($jsonUsuarios){
      $arrayDatos = json_decode($jsonUsuarios,true);
      $sql = "DELETE FROM usuario WHERE nombre='".$arrayDatos['nombre']."';";
      $resultado = $this->realizarQuery($sql);
      return $resultado;
    }
  }
?>