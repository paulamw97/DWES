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

    //Obtener por POST el usuario (que es el email)
    if(isset($_POST['email']) && !is_null($_POST['email'])
        && isset($_POST['pass1']) && !is_null($_POST['pass1'])
          && isset($_POST['nombre']) && !is_null($_POST['nombre'])
            && isset($_POST['apellidos']) && !is_null($_POST['apellidos'])){

        //Introducimos los datos en la sesión
        $seguridad = new Seguridad();
        $seguridad->addDatosRegistro($_POST['email'],$_POST['nombre'],$_POST['apellidos']);

        //Evaluar la contraseña
        if($_POST['pass1'] == $_POST['pass2']){

          //Comprobamos si existe el usuario
          if($bbdd->buscarUsuario($_POST['email'],null)){
            $seguridad->setError("El usuario está repetido");
            header('Location:registro.php');
          }else{
            //Insertamos el usuario
            $usuario_nuevo = $bbdd->insertarUsuario($_POST['email'],sha1($_POST['pass1']),$_POST['nombre'],$_POST['apellidos']);

            if($usuario_nuevo!= null){
              //Como el usuario se ha registrado correctamente añadimos a la sesión
              echo "<h4>Usuario registrado correctamente</h4>";
              echo "<p>Pulse el siguiente <a href='index.php'>enlace</a> para volver al formulario</p>";

              //Borramos los datos de la sesión
              $seguridad->borrarDatos();
            }else{
              echo $bbdd->getErrorConexion();
            }
          }
        }
        else{
          $seguridad->setError("La contraseña no coincide");
          header('Location:registro.php');
        }
    }
    else{
      //Volver al registro con los datos de la sesión
    }
   ?>
  </fieldset>
  <footer>
    <h6>Asignatura: Desarrollo Web en Entorno Servidor</h6>
  </footer>
  </body>
</html>
