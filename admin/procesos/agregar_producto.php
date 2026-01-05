<?php
include_once("../../config.php");

$nombre = $_POST["nombre"];
$precio = $_POST["precio"];
$descripcion = $_POST["descripcion"];
$imagen = $_POST["imagen"];
$promo = $_POST["promo"];
$categoria = $_POST["categoria"];

$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$sql = "INSERT INTO productos (nombre, precio, descripcion, imagen, promo, categoria) VALUES ('$nombre', $precio, '$descripcion', '$imagen', $promo, '$categoria')";
mysqli_query($conexion, $sql);
mysqli_close($conexion);

header("Location: ../index.php?mensaje=El producto se ha agregado correctamente!");