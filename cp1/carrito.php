<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>DWES</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="estilo.css">
  </head>
  <body>
    <h2>Carrito de compra</h2>
    <a href="index.php"><b>Inicio</b></a></br></br>
      <fieldset>
        <legend><b>Lista de productos y cantidades</b></legend>
        <table class="w3-table w3-bordered">
          <tr><th>Producto</th><th>Número de productos</th></tr>
        <?php

          if($_COOKIE["ordenador"] >0){
            echo "<tr><td>Producto 1</td><td>".$_COOKIE["ordenador"]."</td></tr>";
          }
          if($_COOKIE["teclado"] >0){
            echo "<tr><td>Producto 2</td><td>".$_COOKIE["teclado"]."</td></tr>";
          }
          if($_COOKIE["raton"] >0){
            echo "<tr><td>Producto 3</td><td>".$_COOKIE["raton"]."</td></tr>";
          }
          if($_COOKIE["pantalla"] >0){
            echo "<tr><td>Producto 4</td><td>".$_COOKIE["pantalla"]."</td></tr>";
          }
        ?>
        </table>
      </fieldset>
 
  </body>
</html>
