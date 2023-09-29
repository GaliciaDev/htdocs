<?php
session_start();
require_once('conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $precio = $_POST['precio'];
  $descripcion = $_POST['descripcion'];
  $imagen = $_POST['imagen'];
  $existencia = $_POST['existencia'];
  $categoria = $_POST['categoria'];

  // Actualizar datos en la tabla de productos
  $sql = "UPDATE productos SET nombre_p='$nombre', precio_p='$precio', descripcion_p='$descripcion', imagen_p='$imagen', existencia='$existencia', categoria='$categoria' WHERE id_p='$id'";

  if ($conn->query($sql) === TRUE) {
    $_SESSION['msg_success'] = "Producto actualizado correctamente";
  } else {
    $_SESSION['msg_error'] = "Error al actualizar el producto: " . $conn->error;
  }

  // Actualizar los datos en el archivo JSON
  $json_data = file_get_contents('datos.json');
  $data = json_decode($json_data, true);
  foreach ($data as &$producto) {
    if ($producto['id'] == $id) {
      $producto['nombre'] = $nombre;
      $producto['precio'] = $precio;
      $producto['descripcion'] = $descripcion;
      $producto['imagen'] = $imagen;
      $producto['existencia'] = $existencia;
      $producto['categoria'] = $categoria;
      break;
    }
  }
  $json_data = json_encode($data, JSON_PRETTY_PRINT);
  file_put_contents('datos.json', $json_data);

  header('Location: index.php');
  exit();
}

// Obtener el ID del producto a actualizar
$id = $_GET['id'];

// Consultar los datos del producto
$sql = "SELECT * FROM productos WHERE id_p='$id'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
  $row = $result->fetch_assoc();
  $nombre = $row['nombre_p'];
  $precio = $row['precio_p'];
  $descripcion = $row['descripcion_p'];
  $imagen = $row['imagen_p'];
  $existencia = $row['existencia'];
  $categoria = $row['categoria'];
} else {
  $_SESSION['msg_error'] = "No se encontró el producto";
  header('Location: index.php');
  exit();
}

$conn->close();
?>

<form method="POST">
  <input type="hidden" name="id" value="<?php echo $id ?>">
  <label>Nombre:</label>
  <input type="text" name="nombre" value="<?php echo $nombre ?>">
  <br>
  <label>Precio:</label>
  <input type="number" name="precio" value="<?php echo $precio ?>">
  <br>
  <label>Descripción:</label>
  <textarea name="descripcion"><?php echo $descripcion ?></textarea>
  <br>
  <label>Imagen:</label>
  <input type="text" name="imagen" value="<?php echo $imagen ?>">
  <br>
  <label>Existencia:</label>
  <input type="number" name="existencia" value="<?php echo $existencia ?>">
  <br>
  <label>Categoría:</label>
  <input type="text" name="categoria" value="<?php echo $categoria ?>">
  <br>
  <input type="submit" value="Actualizar">
</form>