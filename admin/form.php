<?php
include_once("../shared/template_header.php");
include_once("../home/funciones.php");
getPromo();

include_once("../config.php");
include_once("../navbar.php");
include_once("funciones.php");

$accion = isset($_GET["accion"]) ? $_GET["accion"] : "";
$proceso = "";
$producto = "";

if ($accion == "agregar") {
    $proceso = "/admin/procesos/agregar_producto.php";
} else if ($accion == "editar") {
    $id = isset($_GET["id"]) ? $_GET["id"] : "";
    $producto = getProductoAdmin($id);
    $proceso = "/admin/procesos/editar_producto.php?id=" .$id;
}
?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1 class="fw-bold text-center"><?php echo ucfirst($accion) ." Producto"; ?></h1>
            <form method="POST" action="<?php echo URL_BASE .$proceso; ?>">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo isset($producto["nombre"]) ? $producto["nombre"] : ""; ?>" required />
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" value="<?php echo isset($producto["precio"]) ? $producto["precio"] : ""; ?>" required />
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" required><?php echo isset($producto["descripcion"]) ? $producto["descripcion"] : ""; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="text" class="form-control" id="imagen" name="imagen" value="<?php echo isset($producto["imagen"]) ? $producto["imagen"] : ""; ?>" required />
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Producto Promocionable</label>
                    <select id="promo" name="promo" class="form-control">
                        <option value="1" <?php echo isset($producto["promo"]) && $producto["promo"] == 1 ? "selected='selected'" : ""; ?>>Sí</option>
                        <option value="0" <?php echo isset($producto["promo"]) && $producto["promo"] == 0 ? "selected='selected'" : ""; ?>>No</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Categoría</label>
                    <select id="categoria" name="categoria" class="form-control">
                        <?php
                        $categorias = getCategoriasAdmin();

                        while ($categoria = $categorias->fetch_assoc()) {
                            echo '<option value="' .$categoria["nombre"] .'" '.(isset($producto["categoria"]) && $categoria["nombre"] == $producto["categoria"] ? "selected='selected'" : "") .'>' .ucfirst($categoria["nombre"]) .'</option>';
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"><?php echo ucfirst($accion); ?></button>
            </form>
        </div>
    </div>
</div>

<?php
include_once("../shared/template_footer.php");
?>