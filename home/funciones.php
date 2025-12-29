<?php
function getPromo() {
    $output = "<div class='container-fluid text-white bg-dark py-2 text-center fw-bold fs-6'>💵 HASTA 6 CUOTAS SIN INTERESES 💵</div>";

    echo $output;
}

function getCarousel() {
    $slides = ["slide1.webp", "slide2.webp", "slide3.webp"];
    $output = '<div class="container my-5">
    <div class="row">
        <div class="col">
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                ';

                for ($i=0; $i<count($slides); $i++) {
                    $output .= '<div class="carousel-item active">
                        <img src="../assets/carousel/' .$slides[$i] .'" class="d-block w-100" alt="Slide">
                </div>
                ';
                }
                    
                $output .= '</div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    </div>';
    echo $output;
}

function getProductos($filtrar, $promo) {
    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($filtrar && $promo) {
        $sql = "SELECT * FROM productos WHERE (categoria LIKE '" .$filtrar ."') AND (promo = 1)";
    } else if ($filtrar && !$promo) {
        $sql = "SELECT * FROM productos WHERE (categoria LIKE '" .$filtrar ."')";
    } else if (!$filtrar && $promo) {
        $sql = "SELECT * FROM productos WHERE (promo = 1)";
    } else {
        $sql = "SELECT * FROM productos";
    }

    $resultado = mysqli_query($conexion, $sql);
    mysqli_close($conexion);
    $output = '<div class="container my-5">';
    $output .= '<div class="row">';

    if (mysqli_num_rows($resultado) > 0) {
        while ($producto = $resultado->fetch_assoc()) {
            $output .= '<div class="col-md-3">
            <a href="../detail/index.php?id=' .$producto["id"] .'" class="text-decoration-none">
            <div class="card">
            <img src="' .$producto["imagen"] .'" class="card-img-top" alt="' .$producto["nombre"] .'" />
            <div class="card-body">
                <h6 class="card-title fw-bold">$' .$producto["precio"] .'</h6>
                <p class="card-text fw-light">' .$producto["nombre"] .'</p>
            </div>
            </div>
            </a>
            </div>';
        }
    } else {
        $output .= '<div class="col text-center my-5">
        <h1 class="fw-bold">Error!</h1>
        <h3 class="fw-light">No se encontraron Productos con ese filtro!</h3>
        </div>';
    }

    $output .= '</div>';
    $output .= '</div>';
    
    echo $output; 
}