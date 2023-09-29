<?php

	$conexion = mysqli_connect("localhost","root","")
	or die("Fallo en el establecimiento de la conexion");

	mysqli_select_db($conexion,"papeleria")
	or die("Error en la seleccion de la base de datos");
	
?> 	