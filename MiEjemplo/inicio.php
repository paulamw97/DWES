<?php
	session_start();
	if (!isset($_SESSION['usuario'])){
		if ((isset($_POST['usuario']))){
			$array=array("usuario" => $_POST['usuario']);
			$_SESSION['usuario']=$array;
		} 
	}
?>
<!DOCTYPE html>
<html>
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
	<h2>Elementos disponibles - Usuario: 
		<?php
			echo $_SESSION['usuario']['usuario'];
		?></h2>
<form action="proceso.php" method="post">
	<table>
		<tr><th>Elemento</th><th>Cantidad</th></tr>
		<tr><td>Peras</td><td><input type="text" name="peras" size="2"></td></tr>
		<tr><td>Plátanos</td><td><input type="text" name="platanos" size="2"></td></tr>
	</table>
	<br>
	<input type="submit" class="w3-button w3-black" value="Añadir a carrito">
</form>
<br>
<form action="logout.php" method="post">
	<input type="submit" class="w3-button w3-black" value="Logout">
</form>
<br>
<form action="proceso.php" method="post">
	<input type="submit" class="w3-button w3-black" value="Ver carrito">
</form>
<br>
 </fieldset>
  <footer>
    <h6>Asignatura: Desarrollo Web en Entorno Servidor</h6>
  </footer>
</body>
</html>