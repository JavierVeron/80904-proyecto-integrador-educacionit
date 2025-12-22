<?php
include_once("../shared/template_header.php");
include_once("../home/funciones.php");
getPromo();

include_once("../config.php");
include_once("../navbar.php");
include_once("../assets/productos.php");
include_once("funciones.php");

if (getCantidadProductosCarritoCheckout() == 0) {
    echo "<div class='container my-5'>";
    echo "<div class='row'>";
    echo "<div class='col'>";
    echo "<h1 class='display-5 my-5 text-center'>El Carrito está vacío!</h1>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
} else {
?>
<div class="container my-5">
    <div class="row">
        <div class="col">
            <form method="POST" action="<?php echo URL_BASE; ?>/checkout/procesos/enviar_pedido.php">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" required />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" required />
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" />
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
        <div class="col">
            <table class="table">
                <tbody>
                    <?php
                    foreach(getCarritoCheckout() as $item) {
                        $producto_encontrado;
                        
                        foreach ($productos as $producto) {
                            if ($producto["id"] == $item["id"]) {
                                $producto_encontrado = $producto;
                                break;
                            }
                        }
                        
                        echo "<tr>";
                        echo "<td><img src='" .$producto["imagen"] ."' border='0' width='80' /></td>";
                        echo "<td class='align-middle'>" .$producto["nombre"] ."</td>";
                        echo "<td class='align-middle'>$" .$producto["precio"] ."</td>";
                        echo "<td class='align-middle'>x" .$item["cantidad"] ."</td>";
                        echo "<td class='align-middle'>$" .($item["cantidad"] * $producto["precio"]) ."</td>";
                        echo "</tr>";
                    }
                    ?>
                    <tr>
                        <td colspan="3"><b>Suma Total a Pagar</b><td>
                        <td><b>$<?php echo getSumaProductosCarritoCheckout($productos); ?></b></td>
                    </tr>
                </tbody>
            </table>            
        </div>
    </div>
</div>
<?php
}

include_once("../shared/template_footer.php");
?>