<?php
function getProducto($id) {
    global $productos;

    // Opción #1 => utilizando array_filter
    $producto = array_filter($productos, fn($item) => $item['id'] == $id); // Devuelve un array filtrado (en este caso devuelve 1 solo elemento)

    // Opción #2 => utilizando un foreach
    /* $producto ="";

    foreach ($productos as $item) {
        if ($item["id"] == $id) {
            $producto = $item;
            break;
        }
    } */

    return reset($producto); // Obtiene el primer elemento del array
}