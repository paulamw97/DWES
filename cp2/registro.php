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
    <?php
      if($_SESSION["tipo_error"]!=null){
        echo "<h4 class=\"error\">Error: ".$_SESSION["tipo_error"]."</h4>";
      }
     ?>
    <form action="registro_usuario.php" method="post">
      <label>email</label></br>
      <?php
        if($_SESSION['usuario']!=null){
          echo "<input type='text' id='email' name='email' value='".$_SESSION['usuario']."' required></br>";
        }
        else{
          echo "<input type=\"text\" id=\"email\" name=\"email\" required></br>";
        }
       ?>
      <label>Contraseña</label></br>
      <input type="password" id="pass1" name="pass1" required></br>
      <label>Repetir Contraseña</label></br>
      <input type="password" id="pass2" name="pass2" required></br>
      <label>Nombre</label></br>
      <?php
        if($_SESSION['nombre']!=null){
          echo "<input type='text' id='nombre' name='nombre' value='".$_SESSION['nombre']."' required></br>";
        }
        else{
          echo "<input type=\"text\" id=\"nombre\" name=\"nombre\" required></br>";
        }
       ?>

      <label>Apellidos</label></br>
      <?php
        if($_SESSION['apellidos']!=null){
          echo "<input type='text' id='apellidos' name='apellidos' value='".$_SESSION['apellidos']."' required></br>";
        }
        else{
          echo "<input type=\"text\" id=\"apellidos\" name=\"apellidos\" required></br></br>";
        }
       ?>

      <input type="submit" class="w3-button w3-black" value="REGISTRARSE">
    </form></br>
  </fieldset>
  <footer>
    <h6>Asignatura: Desarrollo Web en Entorno Servidor</h6>
  </footer>
  </body>
</html>
