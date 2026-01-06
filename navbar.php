<?php
include_once("cart/funciones.php");
?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-3">
            <a href="<?php echo URL_BASE; ?>/">
                <svg role="presentation" viewBox="100 100 50 32" xmlns="http://www.w3.org/2000/svg" width="64"><title>tienda online</title><path fill-rule="evenodd" clip-rule="evenodd" d="M 150.07 131.439 L 131.925 100 L 122.206 105.606 L 137.112 131.439 L 150.07 131.439 Z M 132.781 131.439 L 120.797 110.692 L 111.078 116.298 L 119.823 131.439 L 132.781 131.439 Z M 109.718 121.401 L 115.509 131.439 L 102.551 131.439 L 100 127.007 L 109.718 121.401 Z" fill="black"></path></svg>
            </a>
        </div>
        <div class="col-md-6">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link fw-bold text-danger" aria-current="page" href="<?php echo URL_BASE; ?>/home/?promo=true">Hasta 50% OFF</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold text-dark" href="<?php echo URL_BASE; ?>/home/?filtrar=mujeres">Mujeres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold text-dark" href="<?php echo URL_BASE; ?>/home/?filtrar=hombres">Hombres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold text-dark" href="<?php echo URL_BASE; ?>/home/?filtrar=niños">Niños</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold text-dark" href="<?php echo URL_BASE; ?>/contact">Contacto</a>
                </li>
            </ul>
        </div>
        <div class="col-md-3 text-end">
            <?php
            if (validarSesion()) {
                ?>
                <a href="<?php echo URL_BASE; ?>/login/procesos/logout.php" class="btn btn-light mx-1" title="LogOut">
                    <i class="bi bi-box-arrow-left"></i>
                </a>
                <a href="<?php echo URL_BASE; ?>/admin/index.php" class="btn btn-light mx-1" title="Admin">
                    <i class="bi bi-person-plus"></i>
                </a>
                <?php
            } else {
                ?>
                <a href="<?php echo URL_BASE; ?>/login" class="btn btn-light mx-1" title="LogIn">
                    <i class="bi bi-box-arrow-in-right"></i>
                </a>
                <?php
            }
            ?>
            <a href="<?php echo URL_BASE; ?>/cart" class="btn btn-light mx-1 position-relative">
                <i class="bi bi-cart"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php echo getCantidadProductosCarrito(); ?></span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col text-center">
            <form method="GET" action="<?php echo URL_BASE; ?>/shop">
                <div class="input-group mt-3">
                <input type="text" class="form-control" placeholder="Buscar..." id="texto" name="texto" />
                <button class="input-group-text" type="submit"><i class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>