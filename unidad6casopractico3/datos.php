<?php
include 'db.php';


class datos extends db{
 
    function __construct(){
			parent::__construct();
	}
	public function Realizarconsultas($sql){
			
		    $resultado = $this->realizarConsulta($sql);
			
		    if ($resultado!=null){
		    	$tabla=[];
				while($fila=$resultado->fetch_array()){
					$tabla[]=$fila;
				}
		      return $tabla;
		    } else {
		      return null;
		    }
  		}

  	
		public function insertardatosregistro($nombre,$apellidos,$email,$contraseña){
			$rol=0;
			$query="INSERT INTO usuarios(usuario,nombre,apellidos,email,rol,pass) 
		      		VALUES('".$email."','".$nombre."','".$apellidos."','".$email."','".$rol."','".$contraseña."');";
			
			$resultado = $this->realizarConsulta($query);
			return $resultado;
		}
		public function actualizar($email,$rol){
			$query="UPDATE usuarios SET rol='$rol'
			Where usuario='$email'";
			
			$resultado = $this->realizarConsulta($query);
			return $resultado;
		}
		public function obtenerRoles(){

			$sql = "SELECT * FROM roles";
			$resultado = $this->realizarConsulta($sql);
			return $resultado;
		  }
		/*
		public function borrar($nombre){
			$query="Delete from usuarios Where Nombre='$nombre'";
			
		    $resultado = $this->realizarConsulta($query);
		}
		/*public function actualizar($nombre,$procedencia,$altura,$peso,$posicion,$nombre_equipo){
			$query="UPDATE usuarios SET Procedencia='$procedencia', Altura='$altura', Peso='$peso', Posicion='$posicion',Nombre_equipo='$nombre_equipo' Where Nombre='$nombre'";
			
		    $resultado = $this->realizarConsulta($query);
		}*/
		
		

}


?>