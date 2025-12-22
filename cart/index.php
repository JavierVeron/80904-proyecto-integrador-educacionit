<?php
include_once("../shared/template_header.php");
include_once("../home/funciones.php");
getPromo();

include_once("../config.php");
include_once("../navbar.php");
include_once("../assets/productos.php");
include_once("funciones.php");
?>
<div class="container my-5">
    <div class="row">
        <div class="col">
            <?php
            if (getCantidadProductosCarrito() == 0) {
                echo "<h1 class='display-5 my-5 text-center'>El Carrito está vacío!</h1>";
            } else {
            ?>
            <table class="table">
                <tbody>
                    <?php
                    foreach(getCarrito() as $item) {
                        $producto_encontrado;
                        
                        foreach ($productos as $producto) {
                            if ($producto["id"] == $item["id"]) {
                                $producto_encontrado = $producto;
                                break;
                            }
                        }
                        
                        echo "<tr>";
                        echo "<td><img src='" .$producto_encontrado["imagen"] ."' border='0' width='80' /></td>";
                        echo "<td class='align-middle'>" .$producto_encontrado["nombre"] ."</td>";
                        echo "<td class='align-middle'>$" .$producto_encontrado["precio"] ."</td>";
                        echo "<td class='align-middle'>x" .$item["cantidad"] ."</td>";
                        echo "<td class='align-middle'>$" .($item["cantidad"] * $producto_encontrado["precio"]) ."</td>";
                        echo "<td class='align-middle text-end'><button class='btn btn-danger btn-sm'>Eliminar</button></td>";
                        echo "</tr>";
                    }
                    ?>
                    <tr>
                        <td colspan="3"><b>Suma Total a Pagar</b><td>
                        <td><b>$<?php echo getSumaProductosCarrito($productos); ?></b></td>
                        <td class="align-middle text-end"><a href="<?php echo URL_BASE; ?>/checkout" class="btn btn-danger btn-sm">Checkout</a></td>
                    </tr>
                </tbody>
            </table>            
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php
include_once("../shared/template_footer.php");
?>