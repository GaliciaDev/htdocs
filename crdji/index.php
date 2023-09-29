<?php
function listarProductos() {
  require_once('conexion.php');

  // Consultar los datos de los productos
  $sql = "SELECT * FROM productos";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Mostrar los datos en una tabla
    echo "<table>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Descripción</th><th>Imagen</th><th>Existencia</th><th>Categoría</th></tr>";
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["id_p"]."</td><td>".$row["nombre_p"]."</td><td>".$row["precio_p"]."</td><td>".$row["descripcion_p"]."</td><td><img src='img/".$row["imagen_p"]."'></td><td>".$row["existencia"]."</td><td>".$row["categoria"]."</td></tr>";
    }
    echo "</table>";
  } else {
    echo "No se encontraron productos";
  }

  $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Papeleria</title>
</head>
<body>

<h1>Papeleria</h1>

<button onclick="listarProductos()">Listar productos</button>

</body>
</html>