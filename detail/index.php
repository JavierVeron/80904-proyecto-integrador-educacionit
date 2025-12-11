<?php
include_once("../shared/template_header.php");
include_once("../home/funciones.php");
getPromo();

include_once("../config.php");
include_once("../navbar.php");
include_once("../assets/productos.php");
include_once("funciones.php");

$id = $_GET["id"];
$producto = getProducto($id);
?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-4 offset-md-2">
            <img src="<?php echo $producto["imagen"]; ?>" alt="<?php echo $producto["nombre"]; ?>" class="img-fluid" />
        </div>
        <div class="col-md-4">
            <h1><?php echo $producto["nombre"]; ?></h1>
            <p><b>$ <?php echo $producto["precio"]; ?></b></p>
            <p><?php echo $producto["descripcion"]; ?></p>
            <p><b>Categoría:</b> <span class="fw-light text-uppercase"><?php echo $producto["categoria"]; ?></span></p>
            <p><button class="btn btn-dark text-white rounded-0 fw-bold"><span class="me-5">Añadir al Carrito</span> <i class="bi bi-bag-plus ms-5"></i></button></p>
        </div>
    </div>
</div>

<?php
include_once("../shared/template_footer.php");
?>