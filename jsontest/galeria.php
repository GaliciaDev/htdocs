<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css"  href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/estilosPrincipal.css">
	<title>Galeria de Productos</title>
</head>
<body>
	<header>

	</header>
<section>
	<table>
		<?php
		include("conectbd.php");
		$Resultado = mysqli_query($conexion, "SELECT * FROM productos WHERE existencia > 6;");
		echo '<tr><th>Nombre</th><th>Precio</th><th>Imagen de Muestra</th><th>Descripcion del producto</th><th>Carrito</th></tr>';
		while ($row = mysqli_fetch_array($Resultado)) {
			echo '<tr><td>'.utf8_encode($row['nombre_p']).'</td>';
			echo '<td>$'.$row['precio_p'].' MXN</td>';
			echo '<td><img src="img/'.$row['imagen_p'].'" class="ImagenesP"></td>';
			echo '<td>'.utf8_encode($row['descripcion_p']).'</td>';
			echo '<td><a href="detalles.php?id='.$row['id_p'].'"><img src="img/carrito.png" class="ImagenC"></a> </td></tr>';
		}
		mysqli_close($conexion);
		?>
	</table>
</section>
</body>
</html>