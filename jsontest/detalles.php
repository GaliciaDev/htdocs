<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1-transional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=uft-8"/>
	<link type="text/css" href="css/normalize.css" rel="stylesheet"/>
	<link type="text/css" href="css/detalles.css" rel="stylesheet"/>

	<title>Agregar a carrito</title>
</head>
<body>
	<head>

	</head>

	<section>
		<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		include("conectbd.php");
		$Resultado = mysqli_query($conexion, "SELECT * FROM productos WHERE id_p='".$id."';");
		while($row = mysqli_fetch_array($Resultado)){
			echo '<img src="img/'.$row['imagen_p'].'" class="ImagenG">';
			echo '<form action="acumular.php" method="post" name="AgregarCarrito">';
			echo '<input type="text" name="producto" value="'.utf8_encode($row['nombre_p']).'" readonly="readonly">';
			echo "&nbsp;&nbsp;";
			echo '$<input type="text" name="precio" size="1" value="'.$row['precio_p'].'" readonly="readonly">MXN';
			echo "&nbsp;&nbsp;";
			echo '<input type="number" placeholder="Cantidad a Pedir" name="cantidad" size="8" max="10" min="1">';
			echo '<input name="Agregar" type="submit" id="btnagregar" value="Agregar">';
			echo '</form>';
			echo '<h1>'.utf8_encode($row['descripcion_p']).'</h1>';
		}
		mysqli_close($conexion);
	} else {
		echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php">';
	}
?>

</section>
</body>
</html>