<?php
include("../shared/template_header.php");
include("./funciones.php");
getPromo();

include("../config.php");
include("../navbar.php");
include("../assets/productos.php");

getCarousel();
$filtrar = isset($_GET["filtrar"]) ? $_GET["filtrar"] : "";
$promo = isset($_GET["promo"]) ? $_GET["promo"] : "";
getProductos($productos, $filtrar, $promo);

include("../shared/template_footer.php");
?>