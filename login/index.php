<?php
include_once("../shared/template_header.php");
include_once("../home/funciones.php");
getPromo();

include_once("../config.php");
include_once("../navbar.php");

$mensaje = isset($_GET["mensaje"]) ? $_GET["mensaje"] : "";
?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <?php
            if ($mensaje) {
                echo '<div class="alert alert-danger text-center" role="alert">' .$mensaje .'</div>';
            }
            ?>
            <h1 class="fw-bold text-center">Iniciar Sesión</h1>
            <form method="POST" action="<?php echo URL_BASE ."/login/procesos/login.php"; ?>">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="clave" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="clave" name="clave" required>
                </div>
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </form>
        </div>
    </div>
</div>

<?php
include_once("../shared/template_footer.php");
?>