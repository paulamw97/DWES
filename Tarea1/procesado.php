<?php

  session_start();

  //Creamos un array para los nombres
  $array_nombres = [];

  //Lo establecemos a la sesión
  $_SESSION['nombres'] = $array_nombres;

  //Obtenemos el nombre
  $_SESSION['nombres'][] = $_POST['nombre'];

  echo "<!DOCTYPE html>";
  echo "<html lang=\"es\">";
  echo "<head>";
  echo "<meta charset=\"utf-8\">";
  echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";
  echo "<title>DWES</title>";
  echo "<link rel=\"stylesheet\" href=\"https://www.w3schools.com/w3css/4/w3.css\">";
  echo "<link rel=\"stylesheet\" href=\"estilo.css\">";
  echo "</head>";
  echo "<body>";
  echo "<h2>DESARROLLO WEB ENTORNO SERVIDOR - Tarea 1 - Unidad 6 - Último Nombre</h2>";

  echo "<h4>Último nombre introducido:</br></h4><b>";
  $indice = count($_SESSION['nombres']);
  print_r($_SESSION['nombres'][$indice-1]);
  echo "</b></br></br>";

  echo "<fieldset>";
  echo "<a href=\"index.php\">Inicio</a>";
  echo "</fieldset>";
  echo "<footer>";
  echo "<h6>Asignatura: Desarrollo Web Entorno Servidor</h6> </footer>";
  echo "</footer>";
  echo "</body>";
  echo "</html>";
?>
