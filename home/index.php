<?php
include_once("../shared/template_header.php");
include_once("./funciones.php");
getPromo();

include_once("../config.php");
include_once("../navbar.php");
include_once("../assets/productos.php");

getCarousel();
$filtrar = isset($_GET["filtrar"]) ? $_GET["filtrar"] : "";
$promo = isset($_GET["promo"]) ? $_GET["promo"] : "";
getProductos($productos, $filtrar, $promo);

include_once("../shared/template_footer.php");
?>