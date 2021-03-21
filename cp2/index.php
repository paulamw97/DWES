<?php
  include('seguridad.php');
  $seguridad = new Seguridad();
 ?>
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
  <h2>DESARROLLO WEB ENTORNO SERVIDOR - Caso Práctico 2 - Unidad 6 - Mi Perfil</h2>
  <fieldset>
    <form action="miperfil.php" method="post">
      <label>Usuario</label></br>
      <input type="text" id="usuario" name="usuario" required></br>
      <label>Contraseña</label></br>
      <input type="password" id="password" name="password" required></br></br>
      <input type="submit" class="w3-button w3-black"value="ENTRAR">
    </form></br>
    <a href="registro.php"><b>Registrarse</b></a></br>
  </fieldset>
  <footer>
    <h6>Asignatura: Desarrollo Web en Entorno Servidor</h6>
  </footer>
  </body>
</html>
