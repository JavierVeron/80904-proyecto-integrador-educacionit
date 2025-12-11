<?php
include_once("../../shared/template_header.php");
include_once("../../home/funciones.php");
getPromo();

include_once("../../config.php");
include_once("../../navbar.php");

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$consulta = $_POST["consulta"];

// Guardar los datos que me llegan del formulario en un archivo de .csv
$nombreArchivo = "contactos.csv";
$archivo = fopen($nombreArchivo, "a+");
$contenido = $nombre .";" .$email .";" .$telefono .";" .$consulta ."\n";
fputs($archivo, $contenido);
fclose($archivo);
?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-8">
            <h1 class="fw-bold">Gracias!</h1>
            <h3 class="fw-bold">Tu consulta se ha enviado correctamente!</h3>
            <p class="my-5"><a href="<?php echo $url_base; ?>/" class="btn btn-dark text-white rounded-0 fw-bold">Volver a la Página Principal</a></p>
        </div>
        <div class="col-md-4">
            <img src="https://brand.assets.adidas.com/image/upload/f_auto,q_auto,fl_lossy/6366423_CAM_LAM_DAT_ONSITE_YGT_WORLD_CUP_26_JERSEYS_FW_25_LAM_ARG_DELIV_1_SPOTLIGHT_768x1024_1a64d690e9.jpg" alt="Lionel Messi" class="img-fluid">
        </div>
    </div>
</div>

<?php
include_once("../../shared/template_footer.php");
?>