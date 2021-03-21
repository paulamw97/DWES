<?php
  include('seguridad.php');
  $seguridad = new Seguridad();
 ?>
<!DOCTYPE html>
<html>
<body>
<h1>Registro</h1>
<form action="registrarusuario.php" method="post">
<?php
      if($_SESSION["tipo_error"]!=null){
        echo "<h4 style='color:red' >".$_SESSION["tipo_error"]."</h4>";
      }
     ?>
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
     

      <input type="submit" value="REGISTRARSE">
    </form></br>
</body>
</html>