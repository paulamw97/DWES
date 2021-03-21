<?php

include "usuarios.php";

//distinguimos el tipo de peticion

$requestMode=$_SERVER['REQUEST_METHOD'];

if($requestMode=="GET"){
   if(isset($_GET['nombre']) && !is_null($_GET['nombre'])){

     $usuarios = new usuarios();

     $resultado = $usuarios->getUsuario($_GET['nombre']);
     $datos = json_decode($resultado,true);
     echo "<h1>Datos del usuario</h1>";
     echo "<h2>Nombre: ".$datos['nombre']."</h2>";
     echo "<h2>Apellidos: ".$datos['apellidos']."</h2>";
     echo "<h2>Edad: ".$datos['edad']."</h2>";
     echo "<h2>Id: ".$datos['id']."</h2><br>";

     echo "JSON->".$resultado;
  }
  else{
   echo json_encode(["resultado"=>"Fallo:No se ha especificado el nombre del usuario"]);
  }
 }

 elseif($requestMode=="POST"){
    //Obtenemos los parámetros desde Postman
   if(isset($_POST['nombre']) && !is_null($_POST['nombre'])
        && isset($_POST['apellidos']) && !is_null($_POST['apellidos'])
            && isset($_POST['edad']) && !is_null($_POST['edad'])){

              $usuarios = new usuarios();

              $array = array('nombre'=>$_POST['nombre'],'apellidos'=>$_POST['apellidos'],'edad'=>$_POST['edad']);
              $datos = json_encode($array);

              $usuarios->insertUsuario($datos);
              echo "<h1>Se ha insertado el usuario ".$_POST['nombre']."</h1>";

              //Tras actualizar mostramos la información
              $resultado = $usuarios->getUsuario($_POST['nombre']);
              $datos = json_decode($resultado,true);
		      echo "<h1>Datos del usuario</h1>";
		      echo "<h2>Nombre: ".$datos['nombre']."</h2>";
		      echo "<h2>Apellidos: ".$datos['apellidos']."</h2>";
		      echo "<h2>Edad: ".$datos['edad']."</h2>";
		      echo "<h2>Id: ".$datos['id']."</h2>";
   }
   else{
    echo json_encode(["resultado"=>"Fallo:No se han especificado los parámetros"]);
   }
}

elseif($requestMode=="PUT"){

   //Para este ejercicio creamos un json con datos de un array asociativo para hacer la actualización
   //Se ha modificado para obtener los parámetros desde Postman
   if(isset($_GET['id']) && !is_null($_GET['id'])
      && isset($_GET['nombre']) && !is_null($_GET['nombre'])
        && isset($_GET['apellidos']) && !is_null($_GET['apellidos'])
            && isset($_GET['edad']) && !is_null($_GET['edad'])){
              $usuarios = new usuarios();

              $array = array('id'=>$_GET['id'],'nombre'=>$_GET['nombre'],'apellidos'=>$_GET['apellidos'],'edad'=>$_GET['edad']);
              $datos = json_encode($array);

              $usuarios->updateUsuarios($datos);
              echo "<h1>Se ha actualizado el usuario con id".$_GET['id']."</h1>";
   }
   else{
    echo "<h1>No se han especificado los parámetros</h1>";
   }
}

elseif($requestMode=="DELETE"){
   //Obtenemos el nombre
  if(isset($_GET['nombre']) && !is_null($_GET['nombre'])){

     $usuarios = new usuarios();
     $array = array('nombre'=>$_GET['nombre']);

     //Codificamos el envío de datos y realizamos la query
     $datos = json_encode($array);
     $resultado = $usuarios->borrarUsuario($datos);

     if($resultado != null){
       echo "<h1>Se ha borrado el usuario ".$_GET['nombre']."</h1>";
     }
     else{
       echo "<h1>Ha habido un error al borrar el usuario</h1>";
     }
  }
  else{
    echo "<h1>No se han especificado los parámetros</h1>";
  }
 }

 else{
   echo json_encode(["resultado"=>"Fallo"]);
 }

?>
