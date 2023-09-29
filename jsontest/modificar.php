<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modificar JSON</title>
</head>
<body>
<?php
$Criterio="nombre";
$valor=$_GET['JSON'];

// Leer archivo JSON
$NombreArchivo = Date("F_j_Y") . "_Pedido.json";

if (file_exists($NombreArchivo)) {
    $archivo = file_get_contents($NombreArchivo);
    $productos = json_decode($archivo);

    $contador = 0;
    foreach ($productos as $producto) {
        if ($Criterio == "nombre") {
            if ($producto->{'nombre'} == $valor) {
                echo "<h1>Nombre producto: " . $producto->{'nombre'} . "</h1><br>";
                echo "<h2>Precio: " . $producto->{'precio'} . "</h1><br>";
                echo "<h2>Cantidad: " . $producto->{'cantidad'} . "</h1><br>";
                break;
            }
        }
        if ($Criterio == "precio") {
            if ($producto->{'precio'} == $valor) {
                echo "<h1>" . $producto->{'nombre'} . "</h1><br>";
                echo "<h2>" . $producto->{'precio'} . "</h1><br>";
                echo "<h2>" . $producto->{'cantidad'} . "</h1><br>";
                break;
            }
        }
        $contador++;
    }

    echo $contador . "<br>";
    $nombre = "prueba";
    $precio = "100";
    $cantidad = "50";
    $subtotal = $precio * $cantidad;
    $productos=json_decode($archivo,true);

    $productos[$contador]['nombre'] = $nombre;
    $productos[$contador]['precio'] = $precio;
    $productos[$contador]['cantidad'] = $cantidad;
    $productos[$contador]['subtotal'] = $subtotal;

    $json_string = json_encode($productos);
    echo "<h2>Nueva Cadena de JSON</h2>";
    echo $json_string;
    file_put_contents($NombreArchivo, $json_string);

    // Redireccionar a leerJSON.php después de la actualización
    header("Location: leerJSON.php");
    exit();
} else {
    echo "No existe el archivo";
}
?>

</body>
</html>	