<?php
	session_start();
	if (isset($_SESSION['usuario'])){
		$arrayCarro=$_SESSION['usuario'];
		if (isset($_COOKIE['carro'])){
			$arrayCarro=unserialize($_COOKIE['carro']);
			if ($arrayCarro['usuario']==$_SESSION['usuario']['usuario']){
				$_SESSION['usuario']=$arrayCarro;
			} 
		}
		if (isset($_SESSION['usuario'])){
			if (isset($_POST['peras'])) {
	 			if (is_numeric($_POST['peras'])) {
	 				if (!isset($_SESSION['usuario']['peras'])){
		 				$_SESSION['usuario']['peras']=$_POST['peras'];
		 			} else {
						$_SESSION['usuario']['peras']+=$_POST['peras'];
		 			}
	 			}
	 		}
	 		if (isset($_POST['platanos'])) {
	 			if (is_numeric($_POST['platanos'])) {
	 				if (!isset($_SESSION['usuario']['platanos'])){
		 				$_SESSION['usuario']['platanos']=$_POST['platanos'];
		 			} else {
						$_SESSION['usuario']['platanos']+=$_POST['platanos'];
		 			}
	 			}
	 		}
		}
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
  <h2>DESARROLLO WEB ENTORNO SERVIDOR - Ejemplo sesiones + cookies - Unidad 6</h2>
	<fieldset>
		<?php
		echo "<h2>Elementos adquiridos - Usuario:".$_SESSION['usuario']['usuario']."</h2>";
		echo "<table border='1'><th>Producto</th><th>Cantidad</th>";
		foreach($_SESSION['usuario'] as $key => $valor) {
			if ($key!='usuario'){
				echo "<tr><td>".$key."</td><td>".$valor."</td></tr>";
			}
		}
		echo "</table>";
		$arrayCarro=$_SESSION['usuario'];
		echo "<br>";
		setcookie('carro', serialize($arrayCarro), time()*60);
}
?>
<form action="inicio.php" method="post">
	<input type="submit" class="w3-button w3-black" value="Volver">
</form>
<br>
</fieldset>
<footer>
    <h6>Asignatura: Desarrollo Web en Entorno Servidor</h6>
  </footer>
</body>
</html>
