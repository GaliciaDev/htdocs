<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
  include("conexion.php");
  $Resultado = mysqli_query($conn, "SELECT * FROM productos WHERE id_p='".$id."';");
  while($row = mysqli_fetch_array($Resultado)){
    echo '<div class="contenedor">';
    echo '<div class="detalles">';
    echo '<img src="img/'.$row['imagen_p'].'" class="imagen">';
    echo '<div class="descripcion">';
    echo '<h1>'.utf8_encode($row['nombre_p']).'</h1>';
    echo '<p>'.utf8_encode($row['descripcion_p']).'</p>';
    echo '<form action="acumular.php" method="post" name="AgregarCarrito">';
    echo '&nbsp;&nbsp;';
    echo '$<input type="text" name="precio" size="1" value="'.$row['precio_p'].'" readonly="readonly">MXN';
    echo '&nbsp;&nbsp;';
    echo '<input type="number" placeholder="Cantidad a Pedir" name="cantidad" size="8" max="10" min="1">';
    echo '<input name="Agregar" type="submit" id="btnagregar" value="Agregar">';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
  mysqli_close($conn);
  echo '<div class="regresar">';
  echo '<a href="read.php">Regresar</a>';
  echo '</div>';
} else {
  echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php">';
}
?>

<style>
  .contenedor {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: center;
  }

  .detalles {
    display: flex;
    max-width: 650px;
    margin: 20px;
    padding: 20px;
    background-color: #f2f2f2;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }

  .imagen {
    width: 300px;
    height: auto;
    margin-right: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }

  .descripcion {
    flex: 1;
  }

  .descripcion h1 {
    font-size: 24px;
    margin-top: 0;
    margin-bottom: 10px;
  }

  .descripcion p {
    font-size: 16px;
    margin-bottom: 30px;
  }

  .descripcion form {
    display: flex;
    align-items: center;
  }

  .descripcion form input[type="text"],
  .descripcion form input[type="number"],
  .descripcion form input[type="submit"] {
    font-size: 16px;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #4CAF50;
    color: white;
    margin-right: 10px;
  }

  .descripcion form input[type="text"],
  .descripcion form input[type="number"] {
    background-color: #f2f2f2;
    color: black;
  }

  .descripcion form input[type="submit"]:hover {
    background-color: #3e8e41;
  }

  .regresar {
    margin-top: 20px;
    text-align: center;
  }

  .regresar a {
    font-size: 16px;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
  }

  .regresar a:hover {
    background-color: #3e8e41;
  }
</style>