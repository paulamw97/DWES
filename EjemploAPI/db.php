<?php

class db{

    //atributos
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $db_name="usuarios";

    //Conector
    private $conexion;

    //Propiedades para controlar errores
    private $error=false;

    //Constructor
    function __construct() {
      $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db_name);

      if ($this->conexion->connect_errno) {
        $this->error=true;
      }

      $this->conexion->query("SET NAMES 'UTF8'");
    }

    //Funcion para saber si hay error en la conexion
    function hayError(){
      return $this->error;
    }

    public function realizarQuery($sql){
      $resultadoQuery = $this->conexion->query($sql);
      return $resultadoQuery;
    }
}
?>
