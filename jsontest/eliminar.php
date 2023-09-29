<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Eliminar JSON</title>
</head>
<body>
<?php
$NombreArchivo = Date("F_j_Y") . "_Pedido.json";

if (file_exists($NombreArchivo)) {
    $archivo = file_get_contents($NombreArchivo);
    $productos = json_decode($archivo);

    if (!empty($productos)) {
        // Eliminar el primer producto del array
        array_shift($productos);

        $json_string = json_encode($productos);
        echo "<h2>Nueva Cadena de JSON</h2>";
        echo $json_string;

        file_put_contents($NombreArchivo, $json_string);

        // Redireccionar a leerJSON.php después de la eliminación
        header("Location: leerJSON.php");
        exit();
    } else {
        echo "La lista de productos está vacía.";
    }
} else {
    echo "No existe el archivo";
}
?>
</body>
</html>		