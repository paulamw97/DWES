<?php

include "usuarios.php";

//distinguimos el tipo de peticion

$requestMode=$_SERVER['REQUEST_METHOD'];

if($requestMode=="GET"){
   if(isset($_GET['nombreJugador']) && !is_null($_GET['nombreJugador'])){

     $usuarios = new usuarios();

     $resultado = $usuarios->getclubbasket($_GET['nombreJugador']);
     $datos = json_decode($resultado,true);
     echo "<h1>Datos del usuario</h1>";
     echo "<h2>nombreJugador: ".$datos['nombreJugador']."</h2>";
     echo "<h2>posicion: ".$datos['posicion']."</h2>";
     echo "<h2>numero: ".$datos['numero']."</h2>";
     echo "<h2>edad: ".$datos['edad']."</h2><br>";

     echo "JSON->".$resultado;
  }
  else{
   echo json_encode(["resultado"=>"Fallo:No se ha especificado el nombreJugador del usuario"]);
  }
 }

 elseif($requestMode=="POST"){
    //Obtenemos los parámetros desde Postman
   if(isset($_POST['nombreJugador']) && !is_null($_POST['nombreJugador'])
        && isset($_POST['posicion']) && !is_null($_POST['posicion'])
            && isset($_POST['numero']) && !is_null($_POST['numero'])){

              $usuarios = new usuarios();

              $array = array('nombreJugador'=>$_POST['nombreJugador'],'posicion'=>$_POST['posicion'],'numero'=>$_POST['numero']);
              $datos = json_encode($array);

              $usuarios->insertclubbasket($datos);
              echo "<h1>Se ha insertado el usuario ".$_POST['nombreJugador']."</h1>";

              //Tras actualizar mostramos la información
              $resultado = $usuarios->getclubbasket($_POST['nombreJugador']);
              $datos = json_decode($resultado,true);
		      echo "<h1>Datos del usuario</h1>";
		      echo "<h2>nombreJugador: ".$datos['nombreJugador']."</h2>";
		      echo "<h2>posicion: ".$datos['posicion']."</h2>";
		      echo "<h2>numero: ".$datos['numero']."</h2>";
		      echo "<h2>edad: ".$datos['edad']."</h2>";
   }
   else{
    echo json_encode(["resultado"=>"Fallo:No se han especificado los parámetros"]);
   }
}

elseif($requestMode=="PUT"){

   //Para este ejercicio creamos un json con datos de un array asociativo para hacer la actualización
   //Se ha modificado para obtener los parámetros desde Postman
   if(isset($_GET['edad']) && !is_null($_GET['edad'])
      && isset($_GET['nombreJugador']) && !is_null($_GET['nombreJugador'])
        && isset($_GET['posicion']) && !is_null($_GET['posicion'])
            && isset($_GET['numero']) && !is_null($_GET['numero'])){
              $usuarios = new usuarios();

              $array = array('edad'=>$_GET['edad'],'nombreJugador'=>$_GET['nombreJugador'],'posicion'=>$_GET['posicion'],'numero'=>$_GET['numero']);
              $datos = json_encode($array);

              $usuarios->updateclubbasket($datos);
              echo "<h1>Se ha actualizado el usuario con edad".$_GET['edad']."</h1>";
   }
   else{
    echo "<h1>No se han especificado los parámetros</h1>";
   }
}

elseif($requestMode=="DELETE"){
   //Obtenemos el nombreJugador
  if(isset($_GET['nombreJugador']) && !is_null($_GET['nombreJugador'])){

     $usuarios = new usuarios();
     $array = array('nombreJugador'=>$_GET['nombreJugador']);

     //Codificamos el envío de datos y realizamos la query
     $datos = json_encode($array);
     $resultado = $usuarios->borrarUsuario($datos);

     if($resultado != null){
       echo "<h1>Se ha borrado el usuario ".$_GET['nombreJugador']."</h1>";
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
