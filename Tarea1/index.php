<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DWES</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
  <h2>DESARROLLO WEB ENTORNO SERVIDOR - Tarea 1 - Unidad 6 - Último Nombre</h2>
  <?php
    session_start();

    echo "<h4>Último nombre introducido:</br></h4><b>";

    if(count($_SESSION)>0){
      $indice = count($_SESSION['nombres']);
      print_r($_SESSION['nombres'][$indice-1]);
    }
    else{
      print_r($_SESSION);
    }

    echo "</b></br></br>";
  ?>
  <fieldset>
    <legend>Introduzca un nombre</legend>
    <form method="post" action="procesado.php">
      <label>Nombre:</label><br>
      <input type="text" id="nombre" name="nombre" required>
      <br><br>
    <input type="submit" class="w3-button w3-black" value="Ver nombres">
    </form>
  </fieldset>
  <footer>
    <h6>Asignatura: Desarrollo Web Entorno Servidor</h6>
  </footer>
  </body>
</html>
