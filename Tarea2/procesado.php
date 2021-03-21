<?php

  session_start();

  //Definimos el array de nombres
  if (!isset($_SESSION['count'])){
    $array_nombres = [];
    $_SESSION['count']=0;
  //Lo asociamos a la sesión
    $_SESSION['nombres'] = $array_nombres;
  } else {
    $_SESSION['count']++;
  }
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
  echo "<h2>DESARROLLO WEB ENTORNO SERVIDOR - Tarea 2 - Unidad 6 - Último Nombre</h2>";
  echo "<fieldset>";
  echo "<legend>Introduzca un nombre</legend>";
  echo "<form method=\"post\" action=\"procesado.php\">";
  echo "<label>Nombre:</label><br>";
  echo "<input type=\"text\" id=\"nombre\" name=\"nombre\" required>";
  echo "<br><br>";
  echo "<input type=\"submit\" class=\"w3-button w3-black\" value=\"Ver nombres\">";
  echo "</form></br>";
  echo "</fieldset></br>";
  echo "<fieldset>";
  echo "<legend>Todos los nombres:</legend></br><b>";
  print_r($_SESSION);
  echo "</b></br></br>";
  echo "</fieldset></br>";
  echo "<fieldset>";
  echo "<a href=\"cerrar_sesion.php\">Cerrar Sesión</a>";
  echo "</fieldset>";
  echo "<footer>";
  echo "<h6>Asignatura: Desarrollo Web Entorno Servidor</h6>";
  echo "</footer>";
  echo "</body>";
  echo "</html>";
?>
