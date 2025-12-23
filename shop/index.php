<?php
include_once("../shared/template_header.php");
include_once("../home/funciones.php");
getPromo();
include_once("../config.php");
include_once("../navbar.php");
include_once("../assets/productos.php");
include_once("funciones.php");

$texto = isset($_GET["texto"]) ? $_GET["texto"] : "";
$orden = isset($_REQUEST["orden"]) ? strtoupper($_REQUEST["orden"]) : "ASC";
$pagina = isset($_REQUEST["pagina"]) ? $_REQUEST["pagina"] : 1;
$resultadosPorPagina = 2;

getProductosShop($productos, $texto, $orden, $pagina, $resultadosPorPagina);

include_once("../shared/template_footer.php");
?>