<?php
class Seguridad {

  function __construct() {
    session_start();
    if(isset($_SESSION["usuario"])){
       $this->usuario=$_SESSION["usuario"];
    }else{
      $_SESSION["usuario"] = null;
    }

    if(!isset($_SESSION["nombre"])){
      $_SESSION["nombre"] = null;
    }

    if(!isset($_SESSION["apellidos"])){
      $_SESSION["apellidos"] = null;
    }

    if(!isset($_SESSION["tipo_error"])){
      $_SESSION["tipo_error"] = null;
    }
  }

  public function getUsuario(){
    return $this->usuario;
  }

  public function addUsuario($usuario){
      $_SESSION["usuario"]=$usuario;
      $this->usuario=$usuario;
  }

  //El usuario es igual que el email
  //Este método ayuda a completar los datos del registro en caso de error por contraseña
  public function addDatosRegistro($email,$nombre,$apellidos){
      $_SESSION["usuario"]=$email;
      $_SESSION["nombre"]=$nombre;
      $_SESSION["apellidos"]=$apellidos;
  }

  public function setError($tipo_error){
    $_SESSION["tipo_error"] = $tipo_error;
  }

  public function borrarDatos(){
    $_SESSION["usuario"]=null;
    $_SESSION["nombre"]=null;
    $_SESSION["apellidos"]=null;
    $_SESSION["tipo_error"]=null;
  }
}
?>
