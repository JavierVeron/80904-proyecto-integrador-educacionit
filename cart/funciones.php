<?php
session_start();

$_SESSION["cart"] = [
    ["id" => 1, "cantidad" => 1],
    ["id" => 2, "cantidad" => 3]
];

function getCarrito() {
    return $_SESSION["cart"];
}

function getCantidadProductosCarrito() {
    return 1;
}

function getSumaProductosCarrito() {
    return 0;
}
