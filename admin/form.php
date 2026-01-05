<?php
include_once("../shared/template_header.php");
include_once("../home/funciones.php");
getPromo();

include_once("../config.php");
include_once("../navbar.php");
include_once("funciones.php");

$accion = isset($_GET["accion"]) ? $_GET["accion"] : "";
$id = isset($_GET["id"]) ? $_GET["id"] : "";
$proceso = "";

if ($accion == "agregar") {
    $proceso = "/admin/procesos/agregar_producto.php";
} else if ($accion == "editar") {
    $proceso = "/admin/procesos/editar_producto.php";
}
?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1 class="fw-bold text-center"><?php echo ucfirst($accion) ." Producto"; ?></h1>
            <form method="POST" action="<?php echo URL_BASE .$proceso; ?>">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="Zapatilla Superstar" required />
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" value="179999" required />
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" required>Vuelven las emblemáticas zapatillas adidas Superstar. Pisá fuerte con 50 años de estilo deportivo y urbano con estas zapatillas bajas.</textarea>
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="text" class="form-control" id="imagen" name="imagen" value="https://assets.adidas.com/images/h_2000,f_auto,q_auto,fl_lossy,c_fill,g_auto/5643ea9848e94c1da869fd176bd19128_9366/Zapatilla_Superstar_Blanco_IH8659_01_standard.jpg" required />
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Producto Promocionable</label>
                    <select id="promo" name="promo" class="form-control">
                        <option value="1" selected>Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Categoría</label>
                    <select id="categoria" name="categoria" class="form-control">
                        <option value="hombres" selected>Hombres</option>
                        <option value="mujeres">Mujeres</option>
                        <option value="niños">Niños</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
        </div>
    </div>
</div>

<?php
include_once("../shared/template_footer.php");
?>