<?php
include_once("../shared/template_header.php");
include_once("../home/funciones.php");
getPromo();

include_once("../config.php");
include_once("../navbar.php");
include_once("funciones.php");

$id = $_GET["id"];
$accion = isset($_GET["accion"]) ? $_GET["accion"] : "";
$producto = getProducto($id);

if ($accion == "agregar") {
    agregarProductoCarrito($id);
    header("Location: index.php?id=" .$id);
}
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
            <p><a href="<?php echo URL_BASE ."/detail/index.php?id=" .$id ."&accion=agregar"; ?>" class="btn btn-dark text-white rounded-0 fw-bold"><span class="me-5">Añadir al Carrito</span> <i class="bi bi-bag-plus ms-5"></i></a></p>
            <p>
            <?php
            if (buscarProductoCarrito($id)) {
                echo '<span class="badge text-bg-light">Producto agregado</span>';
            }
            ?>
            </p>
        </div>
    </div>
</div>

<?php
include_once("../shared/template_footer.php");
?>