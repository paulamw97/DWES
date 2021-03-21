<?php

class db{
private $host= 'localhost';
 private $user = 'root';
 private $pass = '';
private $db_name = 'ud6casopractico2';
private $men1 = 'Conexión fallida.';
private $men3='Consulta erronea';
private $conexion;
private $error = false;
  function __construct(){
     $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db_name);    
        if($this->conexion->connect_errno){
           $this->error = true;
          echo "<script>alert(''. $this->men1 .'');</script>";
     }
}
function hayError(){
   return  $this->error;
}

 public function realizarConsulta($consulta){
if (!$this->hayError()){
 $resultado = $this->conexion->query($consulta);
return $resultado;
} else {
  echo "<script>alert(''. $this->men3 .'');</script>";
return null;
}
}
}

?>

