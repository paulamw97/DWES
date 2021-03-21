<?php

  include "db.php";

  class usuarios extends db {

    function __construct() {
      parent::__construct();
    }

    //Funciones de CRUD
    //Select
    public function getclubbasket($nombre){
      $sql = "SELECT * FROM clubbasket WHERE nombreJugador='".$nombre."';";
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
      $sql = "INSERT INTO clubbasket (nombreJugador,posicion,numero) VALUES ('".$arrayDatos['nombreJugador']."','".$arrayDatos['posicion']."',".$arrayDatos['numero'].");";

      $resultado = $this->realizarQuery($sql);
      return $resultado;
    }


    //Funciones de CRUD
    //En este caso sólo gestionamos el update
    public function updateUsuarios($jsonUsuarios){
      $arrayDatos = json_decode($jsonUsuarios,true);
      $sql = "UPDATE clubbasket set nombreJugadorJugador='".$arrayDatos['nombreJugador']."',
        posicion='".$arrayDatos['posicion']."',
            numero=".$arrayDatos['numero']." WHERE edad=".$arrayDatos['edad'].";";

      $resultado = $this->realizarQuery($sql);
      return $resultado;
    }

    //Borramos un usuario por su nombreJugador
    public function borrarUsuario($jsonUsuarios){
      $arrayDatos = json_decode($jsonUsuarios,true);
      $sql = "DELETE FROM clubbasket WHERE nombreJugador='".$arrayDatos['nombreJugador']."';";
      $resultado = $this->realizarQuery($sql);
      return $resultado;
    }
  }
?>