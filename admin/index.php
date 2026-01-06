<?php
include_once("../shared/template_header.php");
include_once("../home/funciones.php");
getPromo();

include_once("../config.php");
include_once("../navbar.php");
include_once("funciones.php");

if (!validarSesion()) {
    header("Location: ../home/index.php");
}

$mensaje = isset($_GET["mensaje"]) ? $_GET["mensaje"] : "";
$accion = isset($_GET["accion"]) ? $_GET["accion"] : "";
$filas = 0;

if ($accion == "agregar") {
    header("Location: alta.php");
} else if ($accion == "eliminar") {
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    $filas = eliminarProductoAdmin($id);
}
?>
<div class="container my-5">
    <div class="row">
        <div class="col">
            <?php
            if ($mensaje) {
                echo '<div class="alert alert-success text-center" role="alert">' .$mensaje .'</div>';
            }

            if ($filas > 0) {
                echo '<div class="alert alert-primary text-center" role="alert">Se eliminó correctamente el Producto #' .$id .'</div>';
            }
            ?>
            <table class="table">
                <tbody>
                    <tr>
                        <td colspan="6" class="text-end"><a href="<?php echo URL_BASE ."/admin/form.php?accion=agregar"; ?>" class='btn btn-success btn-sm'>Agregar (+)</a></td></td>
                    </tr>
                    <?php
                    $productos = getProductosAdmin();

                    while ($producto = $productos->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><img src='" .$producto["imagen"] ."' border='0' width='80' /></td>";
                        echo "<td class='align-middle'>" .$producto["nombre"] ."</td>";
                        echo "<td class='align-middle'>$" .$producto["precio"] ."</td>";
                        echo "<td class='align-middle'>" .($producto["promo"] == 1 ? '<span class="badge text-bg-secondary">Promo</span>' : "") ."</td>";
                        echo "<td class='align-middle'><span class='badge text-bg-info'>" .ucfirst($producto["categoria"]) ."</span></td>";
                        echo "<td class='align-middle text-end'><a href='" .URL_BASE ."/admin/form.php?id=" .$producto["id"] ."&accion=editar' class='btn btn-warning btn-sm me-1'>Editar (x)</a><button class='btn btn-danger btn-sm' onclick='eliminarProducto(" .$producto["id"] .");'>Eliminar (-)</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include_once("../shared/template_footer.php");
?>