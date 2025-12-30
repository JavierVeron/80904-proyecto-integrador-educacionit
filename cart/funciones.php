<?php
session_start();

function getCarrito() {
    if (count($_SESSION["cart"]) > 0) {
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
    }

    return $_SESSION["cart"];
}

function getCantidadProductosCarrito() {
    $carrito = getCarrito();
    $cantidadTotal = array_reduce($carrito, fn($acumulador, $item) => $acumulador += $item["cantidad"], 0);

    return $cantidadTotal;
}

function getSumaProductosCarrito() {
    $carrito = getCarrito();
    $sumaTotal = array_reduce($carrito, fn($acumulador, $item) => $acumulador += $item["cantidad"] * $item["precio"], 0);
    
    return $sumaTotal;
}

function agregarProductoCarrito($id) {
    $carrito = getCarrito();
    $existe = false;

    for ($i=0; $i<count($carrito); $i++) {
        if ($carrito[$i]["id"] == $id) {
            $_SESSION["cart"][$i]["cantidad"]++;
            $existe = true;
            print_r("estoy aca");
            break;
        }
    }

    if (!$existe) {
        $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "SELECT id, nombre, precio, imagen FROM productos WHERE id = " .$id;
        $resultado = mysqli_query($conexion, $sql);
        $producto = $resultado->fetch_assoc();
        $producto["cantidad"] = 1;
        array_push($_SESSION["cart"], $producto);
    }
}

function eliminarProductoCarrito($id) {
    $carritoActualizado = array_filter($_SESSION["cart"], function($item) use ($id) {
        return $item["id"] != $id; 
    });
    $_SESSION["cart"] = $carritoActualizado;
}

function vaciarCarrito() {
    $_SESSION["cart"] = [];
}

function buscarProductoCarrito($id) {
    $carrito = getCarrito();
    $existe = false;

    for ($i=0; $i<count($carrito); $i++) {
        if ($carrito[$i]["id"] == $id) {
            $existe = true;
            break;
        }
    }

    return $existe;
}