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
  <h2>productos</h2>
  <a href="index.php"><b>Inicio</b></a>
  <a href="carrito.php"><b>Ver Carrito</b></a></br></br>
  <fieldset>
    <legend>cantidad del producto <b>raton</b></legend>
    <form method="post" action="procesar_carrito.php">

      <input type="hidden" id="raton" name="raton" value="raton">
      <label>Número de productos:</label><br>
      <input type="number" id="numero3" name="numero3" required>
      <br><br>
    <input type="submit" class="w3-button w3-black" value="Añadir al carrito">
  </form></br>
</fieldset></br>

  </body>
</html>
