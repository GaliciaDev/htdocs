<?php
require_once('conexion.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Lista de productos</title>
  <link rel="stylesheet" type="text/css" href="css/read.css">
  <style>
    .oscuro {
      filter: brightness(70%);
    }
    .iluminado {
      filter: brightness(125%);
    }
  </style>
</head>
<body>

<?php
// Consultar los datos de los productos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Mostrar los datos en una tabla
  echo "<table>";
  echo "<tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Descripción</th><th>Imagen</th><th>Existencia</th><th>Categoría</th><th>Comprar</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["id_p"]."</td><td>".$row["nombre_p"]."</td><td>".$row["precio_p"]."</td><td>".$row["descripcion_p"]."</td><td><img src='img/".$row["imagen_p"]."' onmouseover='iluminarImagen(this)' onmouseout='oscurecerImagen(this)' onclick='comprarProducto(".$row["id_p"].", this)'></td><td>".$row["existencia"]."</td><td>".$row["categoria"]."</td><td><img src='img/carrito.png' onmouseover='iluminarImagen(this)' onmouseout='oscurecerImagen(this)' onclick='comprarProducto(".$row["id_p"].", this)'></td></tr>";
  }
  echo "</table>";
} else {
  echo "No se encontraron productos";
}

$conn->close();
?>

<script>
function comprarProducto(id, imagen) {
  if (confirm("¿Está seguro de que desea comprar este producto?")) {
    window.location.href = "detalles.php?id=" + id;
    imagen.classList.add("oscuro");
  }
}

function iluminarImagen(imagen) {
  imagen.classList.add("iluminado");
}

function oscurecerImagen(imagen) {
  imagen.classList.remove("iluminado");
}
</script>

</body>
</html>