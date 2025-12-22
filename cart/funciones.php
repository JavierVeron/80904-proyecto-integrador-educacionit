<?php
session_start();

$_SESSION["cart"] = [
    ["id" => 1, "cantidad" => 1],
    ["id" => 2, "cantidad" => 3],
    ["id" => 4, "cantidad" => 2],
];
//$_SESSION["cart"] = [];

function getCarrito() {
    return $_SESSION["cart"];
}

function getCantidadProductosCarrito() {
    return count($_SESSION["cart"]);
}

function getSumaProductosCarrito($productos) {
    $sumaTotal = 0;

    foreach(getCarrito() as $item) {
        $producto_encontrado;
                        
        foreach ($productos as $producto) {
            if ($producto["id"] == $item["id"]) {
                $producto_encontrado = $producto;
                break;
            }
        }
        $sumaTotal += ($item["cantidad"] * $producto_encontrado["precio"]);
    }

    return $sumaTotal;
}
