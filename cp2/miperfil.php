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
    //Establecer conexión BBDD y gestión de sesiones
    include('bbdd.php');
    include('seguridad.php');

    $bbdd = new BBDD();

    //Obtener pos POST el usuario que es el email
    if(isset($_POST['usuario']) && !is_null($_POST['usuario'])
        && isset($_POST['password']) && !is_null($_POST['password'])){

          $usuario_existente = $bbdd->buscarUsuario($_POST['usuario'],sha1($_POST['password']));

          if($usuario_existente!= null){

            //Mostramos un mensaje de bienvenida
            echo "<h4>Bienvenido usuario ".$usuario_existente->getNombre()."</h4>";

            //Como el usuario existe iniciamos la sesión y guardamos los datos
            $seguridad = new Seguridad();
            $seguridad->addUsuario($_POST['usuario']);

            echo '<form action="actualizar_miperfil.php" method="post">';
              echo '<label>email</label></br>';
              echo "<input type='text' id='email' name='email' value='".$usuario_existente->getEmail()."' readonly></br>";
              echo '<label>Nombre</label></br>';
              echo "<input type='text' id='nombre' name='nombre' value='".$usuario_existente->getNombre()."' required></br>";
              echo '<label>Apellidos</label></br>';
              echo "<input type='text' id='apellidos' name='apellidos' value='".$usuario_existente->getApellidos()."'required></br>";
              echo '<label>Rol</label></br>';
              echo "<select name=\"rol\">";
              $roles = $bbdd->obtenerRoles();
              for ($i=0; $i < $roles->num_rows; $i++) {
                $rol = $roles->fetch_assoc();
                echo "<option value=".$rol['id'].">".$rol['rol']."</option>";
              }
              echo "</select></br></br>";
              echo '<input type="submit" class="w3-button w3-black" value="ACTUALIZAR">';
          echo '</form></br>';
          }
          else{
            echo "<h4>El usuario no existe en la BBDD</h4>";
            echo "<p>Pulse el siguiente <a href='index.php'>enlace</a> para volver al formulario</p>";
          }
    }
    else{
      header('Location:index.php');
    }
    ?>
  </fieldset>
  <footer>
    <h6>Asignatura: Desarrollo Web en Entorno Servidor</h6>
  </footer>
  </body>
</html>
