<?php
function getProductosAdmin() {
    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $sql = "SELECT * FROM productos ORDER BY id";
    $resultado = mysqli_query($conexion, $sql);
    mysqli_close($conexion);

    return $resultado;
}

function getProductoAdmin($id) {
    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $sql = "SELECT * FROM productos WHERE id = " .$id;
    $resultado = mysqli_query($conexion, $sql);
    $fila = mysqli_fetch_assoc($resultado);
    mysqli_close($conexion);

    return $fila;
};

function eliminarProductoAdmin($id) {
    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $sql = "DELETE FROM productos WHERE id = " .$id;
    mysqli_query($conexion, $sql);
    $filas = mysqli_affected_rows($conexion);
    mysqli_close($conexion);

    return $filas;
};

function getCategoriasAdmin() {
    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $sql = "SELECT DISTINCT(categoria) as nombre FROM productos ORDER BY categoria";
    $resultado = mysqli_query($conexion, $sql);
    mysqli_close($conexion);

    return $resultado;
}
