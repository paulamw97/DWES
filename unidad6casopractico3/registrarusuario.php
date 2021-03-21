<?php
$email=$_REQUEST["email"];

$contraseña=$_REQUEST["pass1"];
$contraseña2=$_REQUEST["pass2"];
$nombre=$_REQUEST["nombre"];
$apellidos=$_REQUEST["apellidos"];
$contraseña=sha1($contraseña);
$contraseña2=sha1($contraseña2);
include "datos.php";
include "seguridad.php";
	 $usuarios = new datos();
	 
	 if(isset($email)&&isset($contraseña)&&isset($nombre)&&isset($apellidos)
		 &&!empty($email)&&!empty($contraseña)&&!empty($nombre)&&!empty($apellidos)){		 
			
			
			$seguridad=new Seguridad();
			$seguridad->addDatosRegistro($email,$nombre,$apellidos);
			
			
			if($contraseña==$contraseña2){
				$sql1="Select * from usuarios Where usuario='".$email."'";
				$resultado=$usuarios->Realizarconsultas($sql1);
				if($resultado!=null){
					?>
					<div>
					<p style="color:red">
					<?php
				$seguridad->setError("El usuario está repetido");
				?>
				</p>
					<div>
					<?php
				header('Location:registro.php');
				
				}else{
					$usuario_nuevo=$usuarios->insertardatosregistro($nombre,$apellidos,$email,$contraseña);
					if($usuario_nuevo!=null){

						echo "<h1>El usuario se ha registrado correctamente</h1>";
						echo "<p>Pulse el siguiente <a href='index.php'>enlace</a> para volver al formulario</p>";
						$seguridad->borrarDatos();
					}else{
						echo $usuarios->hayError();
					}

					
				}



			}
			else{
				$seguridad->setError("La contraseña no coincide");
				header('Location:registro.php');
			  }

	 }





?>
