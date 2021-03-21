<?php
 include('datos.php');
 include('seguridad.php');
 $usuarios = new datos();
 $email=$_POST["email"];
$nombre=$_POST["nombre"];
$apellidos=$_POST["apellidos"];
$rol=$_POST["rol"];
if(isset($nombre)&&isset($apellidos)
&&!empty($nombre)&&!empty($apellidos)){	
    $actualizarusuario=$usuarios->actualizar($email,$rol);
if($actualizarusuario!=null){
    echo "<h4>Se han modificado los datos del usuario ".$nombre."</h4>";
    echo "<p>Pulse el siguiente <a href='index.php'>enlace</a> para volver al inicio</p>";
    

}else{
    echo "<h4>Ha habido un error en la actualización.".$usuarios->hayError()."</h4>";
    echo "<p>Pulse el siguiente <a href='miperfil.php'>enlace</a> para volver al formulario</p>";
   
}
$seguridad = new Seguridad();
$seguridad->borrarDatos();
}
else{
    header('Location:index.php');
}
 ?>