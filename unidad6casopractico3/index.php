<?php
  include('seguridad.php');
  $seguridad = new Seguridad();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
</head>
<body>
    <form action="miperfil.php" method="post">
      <label>Usuario</label></br>
      <input type="text" id="usuario" name="usuario" required></br>
      <label>Contraseña</label></br>
      <input type="password" id="password" name="password" required></br></br>
      <input type="submit" value="ENTRAR">
    </form></br>
    <a href="registro.php"><b>Registrarse</b></a></br>
</body>
</html>
