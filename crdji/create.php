<?php
session_start();
require_once('conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nombre = $_POST['nombre'];
  $precio = $_POST['precio'];
  $descripcion = $_POST['descripcion'];
  $imagen = $_POST['imagen'];
  $existencia = $_POST['existencia'];
  $categoria = $_POST['categoria'];

  // Insertar datos en la tabla de productos
  $sql = "INSERT INTO productos (nombre_p, precio_p, descripcion_p, imagen_p, existencia, categoria)
  VALUES ('$nombre', '$precio', '$descripcion', '$imagen', '$existencia', '$categoria')";

  if ($conn->query($sql) === TRUE) {
    $_SESSION['msg_success'] = "Producto agregado correctamente";
  } else {
    $_SESSION['msg_error'] = "Error al agregar el producto: " . $conn->error;
  }

  // Guardar los datos en el archivo JSON
  $json_data = file_get_contents('datos.json');
  $data = json_decode($json_data, true);
  $data[] = array(
    'nombre' => $nombre,
    'precio' => $precio,
    'descripcion' => $descripcion,
    'imagen' => $imagen,
    'existencia' => $existencia,
    'categoria' => $categoria
  );
  $json_data = json_encode($data, JSON_PRETTY_PRINT);
  file_put_contents('datos.json', $json_data);

  header('Location: index.php');
  exit();
}