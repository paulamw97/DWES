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
  <h2>Todos los nombres</h2>
  <fieldset>
    <legend>Introduce un nombre</legend>
    <form method="post" action="procesado.php">
      <label>Nombre:</label><br>
      <input type="text" id="nombre" name="nombre" required>
      <br><br>
    <input type="submit" class="w3-button w3-black" value="Ver nombres">
  </form></br>
</fieldset></br>
  <fieldset>
    <legend>Todos los nombres</legend>
    <?php
      session_start();
      print_r($_SESSION);
      echo "</b></br></br>";
    ?>
  </fieldset></br>
<fieldset>
    <a href="cerrar_sesion.php">Cerrar Sesión</a>
  </fieldset>
  <footer>
    <h6>Asignatura: Desarrollo Web Entorno Servidor</h6>
  </footer>
  </body>
</html>
