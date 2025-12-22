<?php
function getCarritoCheckout() {
    return $_SESSION["cart"];
}

function getCantidadProductosCarritoCheckout() {
    return count($_SESSION["cart"]);
}

function getSumaProductosCarritoCheckout($productos) {
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