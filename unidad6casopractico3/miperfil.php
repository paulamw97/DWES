<?php
     include('datos.php');
     include('seguridad.php');
     $usuarios = new datos();
     $usuario=$_POST['usuario'];
     $contraseña=$_POST['password'];
     $contraseña=sha1($contraseña);
     if(isset($usuario)&&isset($contraseña)
     &&!empty($usuario)&&!empty($contraseña)){
        $sql1="Select * from usuarios Where usuario='".$usuario."' and pass='".$contraseña."'";
				if($usuarios->Realizarconsultas($sql1)==!null){
                    $resultadoFinal=$usuarios->Realizarconsultas($sql1);
                    foreach ($resultadoFinal as $resultado){
                        $nombre=$resultado['nombre'];
                        $apellidos=$resultado['apellidos'];
                        $email=$resultado['email'];
                        $rol=$resultado['rol'];
                    }
                    $seguridad = new Seguridad();
                    $seguridad->addUsuario($usuario);
                    echo '<form action="actualizarusuario.php" method="post">';
                    echo '<label>Nombre</label></br>';
                    echo "<input type='text' id='nombre' name='nombre' value='".$nombre."' required></br>";
                    echo '<label>Apellidos</label></br>';
                    echo "<input type='text' id='apellidos' name='apellidos' value='".$apellidos."'required></br>";
                    echo '<label>email</label></br>';
                    echo "<input type='text' id='email' name='email' value='".$email."' readonly></br>";
                    echo "<label>Rol</label></br>";
                    echo "<select name=\"rol\">";
              $roles = $usuarios->obtenerRoles();
              for ($i=0; $i < $roles->num_rows; $i++) {
                $rol = $roles->fetch_assoc();
                echo "<option value=".$rol['id'].">".$rol['rol']."</option>";
              }
              echo "</select></br></br>";
                    echo "</select></br></br>";
                    echo '<input type="submit"  value="ACTUALIZAR">';
                     echo '</form></br>';






                }else{
                echo "<h4 style='color:red'>El usuario no existe en la BBDD</h4>";
            echo "<p>Pulse el siguiente <a href='index.php'>enlace</a> para volver al login</p>";
            echo "<p>Pulse el siguiente <a href='registro.php'>enlace</a> para volver si quiere registrarse</p>";
          }





     }
     else{
        header('Location:index.php');

     }	 
?>