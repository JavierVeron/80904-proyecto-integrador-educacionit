<?php
function getCarritoCheckout() {
    return getCarrito();
}

function getCantidadProductosCarritoCheckout() {
    return count($_SESSION["cart"]);
}

function getSumaProductosCarritoCheckout() {
    return getSumaProductosCarrito();
}