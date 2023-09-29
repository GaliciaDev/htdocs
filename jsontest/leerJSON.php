<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link type="text/css" href="css/normalize.css" rel="stylesheet" />
	<link type="text/css" href="css/estilosPrincipal.css" rel="stylesheet" />

	<title>Leer JSON</title>

</head>
<body>

	<header>
		<h1><center>Tu pedido por JSON</center></h1>
	</header>
	<section id="Cuadricula">

		<table class="grilla" id="tabalajson">
		<thead>
			<th>Nombre</th>
			<th>Precio</th>
			<th>Cantidad</th>
			<th>SubTotal</th>
			<th>Modificar</th>
		</thead>

<?php 
$NombreArchivo=Date("F_j_Y")."_Pedido.json";
$Total=0;
if(file_exists($NombreArchivo)){
	$archivo=file_get_contents($NombreArchivo);
	$productos=json_decode($archivo);
	foreach ($productos as $producto) {
		echo '<tr><td><h3>'.$producto->{'nombre'}.'</h3></td>';
		echo '<td><h2>$'.$producto->{'precio'}.'</h2></td>';
		echo '<td><h3>'.$producto->{'cantidad'}.'</h3></td>';
		echo '<td><h3>$'.$producto->{'subtotal'}.'</h3></td></td>';
		echo '<td><a class="botonn" href="modificar.php?JSON='.$producto->{'nombre'}.'">Modificar</a></td>';
		$Total=$Total+$producto->{'subtotal'};
	}

}else{
	echo '<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=index.php">';
}

?>
		</table>
	</section>

	<section id="Total">
		<?php
			echo 'Total a pagar: $'.$Total;
			echo '<br>';
			echo '<br><a href="eliminar.php" class="boton"><h2>Eliminar producto</h2></a>';
		?>
	</section>
	<div style="text-align: center; position: absolute; bottom: 20; width: 100%; margin-top: 20px;">
  		<footer></footer>
		<br><br><br><br>
		<a href="index.php"><h2>Regresa al menu</h2></a>
	</div>
	
</body>
</html>