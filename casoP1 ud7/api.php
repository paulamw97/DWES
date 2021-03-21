<?php

include "usuarios.php";

//distinguimos el tipo de peticion

$requestMode=$_SERVER['REQUEST_METHOD'];

if($requestMode=="GET"){
   if(isset($_GET['Nombre']) && !is_null($_GET['Nombre'])){

     $usuarios = new usuarios();

     $resultado = $usuarios->getequipo($_GET['Nombre']);
     $datos = json_decode($resultado,true);
     echo "<h1>Datos del usuario</h1>";
     echo "<h2>Nombre: ".$datos['Nombre']."</h2>";
     echo "<h2>Ciudad: ".$datos['Ciudad']."</h2>";
     echo "<h2>Conferencia: ".$datos['Conferencia']."</h2>";
     echo "<h2>Division: ".$datos['Division']."</h2><br>";

     echo "JSON->".$resultado;
  }
  else{
   echo json_encode(["resultado"=>"Fallo:No se ha especificado el Nombre del usuario"]);
  }
 }

 elseif($requestMode=="POST"){
    //Obtenemos los parámetros desde Postman
   if(isset($_POST['Nombre']) && !is_null($_POST['Nombre'])
        && isset($_POST['Ciudad']) && !is_null($_POST['Ciudad'])
            && isset($_POST['Conferencia']) && !is_null($_POST['Conferencia'])){

              $usuarios = new usuarios();

              $array = array('Nombre'=>$_POST['Nombre'],'Ciudad'=>$_POST['Ciudad'],'Conferencia'=>$_POST['Conferencia']);
              $datos = json_encode($array);

              $usuarios->insertequipo($datos);
              echo "<h1>Se ha insertado el usuario ".$_POST['Nombre']."</h1>";

              //Tras actualizar mostramos la información
              $resultado = $usuarios->getquipo($_POST['Nombre']);
              $datos = json_decode($resultado,true);
		      echo "<h1>Datos del usuario</h1>";
		      echo "<h2>Nombre: ".$datos['Nombre']."</h2>";
		      echo "<h2>Ciudad: ".$datos['Ciudad']."</h2>";
		      echo "<h2>Conferencia: ".$datos['Conferencia']."</h2>";
		      echo "<h2>Division: ".$datos['Division']."</h2>";
   }
   else{
    echo json_encode(["resultado"=>"Fallo:No se han especificado los parámetros"]);
   }
}

elseif($requestMode=="PUT"){

   //Para este ejercicio creamos un json con datos de un array asociativo para hacer la actualización
   //Se ha modificado para obtener los parámetros desde Postman
   if(isset($_GET['Division']) && !is_null($_GET['Division'])
      && isset($_GET['Nombre']) && !is_null($_GET['Nombre'])
        && isset($_GET['Ciudad']) && !is_null($_GET['Ciudad'])
            && isset($_GET['Conferencia']) && !is_null($_GET['Conferencia'])){
              $usuarios = new usuarios();

              $array = array('Division'=>$_GET['Division'],'Nombre'=>$_GET['Nombre'],'Ciudad'=>$_GET['Ciudad'],'Conferencia'=>$_GET['Conferencia']);
              $datos = json_encode($array);

              $usuarios->updateequipo($datos);
              echo "<h1>Se ha actualizado el usuario con Division".$_GET['Division']."</h1>";
   }
   else{
    echo "<h1>No se han especificado los parámetros</h1>";
   }
}

elseif($requestMode=="DELETE"){
   //Obtenemos el Nombre
  if(isset($_GET['Nombre']) && !is_null($_GET['Nombre'])){

     $usuarios = new usuarios();
     $array = array('Nombre'=>$_GET['Nombre']);

     //Codificamos el envío de datos y realizamos la query
     $datos = json_encode($array);
     $resultado = $usuarios->borrarUsuario($datos);

     if($resultado != null){
       echo "<h1>Se ha borrado el usuario ".$_GET['Nombre']."</h1>";
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
