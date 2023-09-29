<?php
$json_data = file_get_contents('datos.json');
$data = json_decode($json_data, true);
?>

<!-- Mostrar los productos en una tabla -->
<table>
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Descripción</th>
      <th>Imagen</th>
      <th>Existencia</th>
      <th>Categoría</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $row) : ?>
      <tr>
        <td><?= $row['nombre'] ?></td>
        <td><?= $row['precio'] ?></td>
        <td><?= $row['descripcion'] ?></td>
        <td><?= $row['imagen'] ?></td>
        <td><?= $row['existencia'] ?></td>
        <td><?= $row['categoria'] ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>