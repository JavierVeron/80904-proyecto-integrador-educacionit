<?php
include_once("../shared/template_header.php");
include_once("../home/funciones.php");
getPromo();

include_once("../config.php");
include_once("../navbar.php");
?>

<div class="container my-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center fw-bold mb-5">Formulario de Contacto</h1>
            <form method="post" action="<?php echo $url_base; ?>/contact/procesos/procesar_formulario.php">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required />
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="number" class="form-control" id="telefono" name="telefono" />
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Consulta</label>
                    <textarea class="form-control" id="consulta" name="consulta" required></textarea>
                </div>
                <button type="submit" class="btn btn-dark text-white rounded-0 fw-bold"><span class="me-5">Enviar</span> <i class="bi bi-envelope"></i></button>
            </form>
        </div>
    </div>
</div>

<?php
include_once("../shared/template_footer.php");
?>