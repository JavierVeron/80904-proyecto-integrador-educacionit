<?php
session_start();

$_SESSION["cart"] = [
    ["id" => 1, "cantidad" => 1],
    ["id" => 2, "cantidad" => 3],
    ["id" => 4, "cantidad" => 2],
];
//$_SESSION["cart"] = [];

function getCarrito() {
    $ids = array_map(fn($item) => $item["id"], $_SESSION["cart"]); //[1, 2, 4]
    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $sql = "SELECT * FROM productos WHERE id IN (" .implode(",", $ids) .")"; //SELECT * FROM productos WHERE id IN (1, 2, 4);
    $resultado = mysqli_query($conexion, $sql);
    $carritoConProductos = [];

    while ($producto = $resultado->fetch_assoc()) {
        foreach ($_SESSION["cart"] as $item) {
            if ($item["id"] == $producto["id"]) {
                $item["nombre"] = $producto["nombre"];
                $item["precio"] = $producto["precio"];
                $item["imagen"] = $producto["imagen"];
                array_push($carritoConProductos, $item);
            }
        }        
    }

    $_SESSION["cart"] = $carritoConProductos;

    return $_SESSION["cart"];
}

function getCantidadProductosCarrito() {
    return count($_SESSION["cart"]);
}

function getSumaProductosCarrito() {
    $sumaTotal = 0;
    $carrito = getCarrito();

    foreach ($carrito as $producto) {
        $sumaTotal += ($producto["cantidad"] * $producto["precio"]);
    }

    return $sumaTotal;
}
