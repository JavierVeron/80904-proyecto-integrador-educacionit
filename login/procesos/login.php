<?php
include_once("../../config.php");

$email = $_POST["email"];
$clave = $_POST["clave"];

$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$sql = "SELECT * FROM usuarios WHERE (email LIKE '" .$email ."') AND (clave LIKE '" .md5($clave) ."')";
$resultado = mysqli_query($conexion, $sql);
$filas = mysqli_num_rows($resultado);
mysqli_close($conexion);

if ($filas > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    session_start();
    $_SESSION["usuario_nombre"] = $fila["nombre"];
    header("Location: ../../admin/index.php");
} else {
    header("Location: ../index.php?mensaje=Error! El Usuario y/o Contraseña es incorrecto!");
}
