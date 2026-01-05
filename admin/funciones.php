<?php
function getProductosAdmin() {
    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $sql = "SELECT * FROM productos ORDER BY id";
    $resultado = mysqli_query($conexion, $sql);
    mysqli_close($conexion);

    return $resultado;
}

function eliminarProductoAdmin($id) {
    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $sql = "DELETE FROM productos WHERE id = " .$id;
    mysqli_query($conexion, $sql);
    $filas = mysqli_affected_rows($conexion);
    mysqli_close($conexion);

    return $filas;
};