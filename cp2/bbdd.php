<?php

//Incluimos la clase Usuario
include('Clases/Usuario.php');

class BBDD {

    //atributos
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $db_name="miperfil";

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

    //El usuario es idéntico al email
    //En la v 1.0 el rol por defecto es user
    public function insertarUsuario($email,$pass,$nombre,$apellidos){

        $nuevo_usuario = new Usuario();

        //Completamos los datos del usuario
        $nuevo_usuario->setUsuario($email);
        $nuevo_usuario->setNombre($nombre);
        $nuevo_usuario->setApellidos($apellidos);
        $nuevo_usuario->setEmail($email);
        $nuevo_usuario->setRol(0);
        $nuevo_usuario->setPassword($pass);

        //Encriptamos la contraseña
        $sha1_pass = sha1($pass);

        //creamos la consulta
        $sql = "INSERT INTO usuarios (usuario,nombre,apellidos,email,rol,pass)
        VALUES ('".$email."','".$nombre."','".$apellidos."','".$email."','1','".$sha1_pass."')";

        if ($this->conexion->query($sql) === TRUE) {
          $nuevo_usuario->setId($this->conexion->insert_id);
          return $nuevo_usuario;
        }
        else {
          return null;
        }
    }

    public function getErrorConexion(){
      return $this->conexion->error;
    }

    public function actualizarUsuario($usuario,$nombre,$apellidos,$rol){
        $usuario_modificado = new Usuario();

        //Completamos los datos del equipo
        $usuario_modificado->setUsuario($usuario);
        $usuario_modificado->setNombre($nombre);
        $usuario_modificado->setApellidos($apellidos);
        $usuario_modificado->setRol($rol);

        //creamos la consulta
        $sql = "UPDATE usuarios SET nombre = '".$nombre."',apellidos =
         '".$apellidos."',rol = '".$rol."' WHERE usuario = '".$usuario."'";

        if ($this->conexion->query($sql) === TRUE) {
          return $usuario_modificado;
        }
        else {
          return null;
        }
    }

    public function buscarUsuario($usuario,$pass){

      $sql = null;

      if($pass != null){
        //Encriptamos la contraseña para compararla con BBDD
        $sha1_pass = sha1($pass);
        $sql = "SELECT * FROM usuarios WHERE usuario = '".$usuario."' AND pass = '".$sha1_pass."'";
      }
      else{
        $sql = "SELECT * FROM usuarios WHERE usuario = '".$usuario."'";
      }

      $resultado = $this->conexion->query($sql);
      if($resultado->num_rows>0){
        $usuario = new Usuario();
        for ($i=0; $i <$resultado->num_rows; $i++) {
          if($i == 0){
            $usu = $resultado->fetch_assoc();
            $usuario->setId($usu['id']);
            $usuario->setEmail($usu['email']);
            $usuario->setNombre($usu['nombre']);
            $usuario->setApellidos($usu['apellidos']);
          }
        }
        return $usuario;
      }
      else{
        return null;
      }
    }

    //Obtenemos los roles
    public function obtenerRoles(){

      $sql = "SELECT * FROM roles";
      $resultado = $this->conexion->query($sql);
      return $resultado;
    }
}
?>
