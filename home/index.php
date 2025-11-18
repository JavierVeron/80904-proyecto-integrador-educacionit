<?php
include("../shared/template_header.php");
include("./funciones.php");
getPromo();

include("../navbar.php");
include("../assets/productos.php");

getCarousel();
getProductos($productos);

include("../shared/template_footer.php");
?>