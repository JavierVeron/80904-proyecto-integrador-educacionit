<?php
include_once("../../config.php");

$id = $_GET["id"];
$nombre = $_POST["nombre"];
$precio = $_POST["precio"];
$descripcion = $_POST["descripcion"];
$imagen = $_POST["imagen"];
$promo = $_POST["promo"];
$categoria = $_POST["categoria"];

$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$sql = "UPDATE productos SET nombre = '$nombre', precio = $precio, descripcion = '$descripcion', imagen = '$imagen', promo = $promo, categoria = '$categoria' WHERE id = " .$id;
mysqli_query($conexion, $sql);
mysqli_close($conexion);

header("Location: ../index.php?mensaje=El producto se ha actualizado correctamente!");