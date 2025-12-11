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
                        /* $producto = array_find($productos, function ($value, $key) {
                            return $value[0] === $key;
                        }); */
                        $producto = $productos[0];
                        echo "<tr>";
                        echo "<td><img src='" .$producto["imagen"] ."' border='0' width='80' /></td>";
                        echo "<td class='align-middle'>" .$producto["nombre"] ."</td>";
                        echo "<td class='align-middle'>$" .$producto["precio"] ."</td>";
                        echo "<td class='align-middle'>x" .$item["cantidad"] ."</td>";
                        echo "<td class='align-middle'>$" .($item["cantidad"] * $producto["precio"]) ."</td>";
                        echo "</tr>";
                    }
                    ?>
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