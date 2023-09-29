<?php
require_once('conexion.php');

// Obtener el ID del producto a borrar
$id = $_GET["id"];

// Ejecutar la consulta SQL para borrar el producto
$sql = "DELETE FROM productos WHERE id_p = $id";
if ($conn->query($sql) === TRUE) {
  echo "Producto borrado";
} else {
  echo "Error al borrar el producto: " . $conn->error;
}

$conn->close();
?>