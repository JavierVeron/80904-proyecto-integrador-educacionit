<?php
function getProducto($id) {
    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $sql = "SELECT * FROM productos WHERE id = " .$id;
    $resultado = mysqli_query($conexion, $sql);
    $producto = mysqli_fetch_assoc($resultado);
    mysqli_close($conexion);

    return $producto;
}