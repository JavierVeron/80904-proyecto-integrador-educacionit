<?php
include_once("../../shared/template_header.php");
include_once("../../home/funciones.php");
getPromo();

include_once("../../config.php");
include_once("../../navbar.php");
include_once("../../assets/productos.php");
include_once("../../cart/funciones.php");

?>
<div class="container my-5">
    <div class="row">
        <div class="col">
            <?php
            // Obtengo los datos del Formulario
            $nombre = $_POST["nombre"];
            $email = $_POST["email"];
            $telefono = $_POST["telefono"];

            $sitio = "Adidas Argentina";
            $asunto = $sitio ." - Gracias por tu Compra";
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n"; // Sets the content type to HTML
            $headers .= 'From: Loading Webs <info@loadingwebs.com>' . "\r\n"; // Sender's address
            $contenido = "<html>
            <body>
            <p><b>Detalle de tu Compra</b></p>
            <table cellpadding='5' cellspacing='5' border='0' style='border:1px solid #CCCCCC;'>";

            foreach(getCarrito() as $item) {
                $producto_encontrado;
                
                foreach ($productos as $producto) {
                    if ($producto["id"] == $item["id"]) {
                        $producto_encontrado = $producto;
                        break;
                    }
                }
                
                $contenido .= "<tr>";
                $contenido .= "<td><img src='" .$producto_encontrado["imagen"] ."' border='0' width='80' /></td>";
                $contenido .= "<td>" .$producto_encontrado["nombre"] ."</td>";
                $contenido .= "<td>$" .$producto_encontrado["precio"] ."</td>";
                $contenido .= "<td>x" .$item["cantidad"] ."</td>";
                $contenido .= "<td>$" .($item["cantidad"] * $producto_encontrado["precio"]) ."</td>";
                $contenido .= "</tr>";
            }

            $contenido .= "<tr>";
            $contenido .= "<td colspan='4'>Suma Total</td>";
            $contenido .= "<td><b>$" .getSumaProductosCarrito($productos) ."</b></td>";
            $contenido .= "</tr>";
            $contenido .= "</table>
            </body>
            </html>";
            //echo $contenido;
            //mail($email, $asunto, $mensaje, $headers); // Aquí se realiza el envío del email

            $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $total = getSumaProductosCarrito($productos);
            $fecha = date("Y-m-d H:i:s");
            $sql = "INSERT INTO pedidos (nombre, email, telefono, productos, total, fecha) VALUES ('$nombre', '$email', '$telefono', '" .json_encode($_SESSION["cart"]) ."', " .$total .", '" .$fecha ."')";
            //echo $sql;
            $resultado = mysqli_query($conexion, $sql);

            if ($resultado) {
                echo "<h1 class='text-center fw-bold'>Gracias por tu Compra!</h1>";
                echo '<div class="alert alert-success text-center" role="alert">El pedido se ha guardado correctamente!</div>';
            } else {
                echo '<div class="alert alert-danger text-center" role="alert">Error! El pedido no pudo ser guardardo correctamente en la Base de Datos!</div>';
            }
            ?>
        </div>
    </div>
</div>
<?php
include_once("../../shared/template_footer.php");
?>