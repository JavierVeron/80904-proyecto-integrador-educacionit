<?php
function array_sort($array, $on, $order=SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

        foreach ($sortable_array as $k => $v) {
            array_push($new_array, $array[$k]);
        }
    }

    return $new_array;
}

function getProductosShop($productos, $texto, $orden, $pagina, $resultadosPorPagina) {
    if ($texto) {
        $productos = array_filter($productos, fn($item) => strpos(strtoupper($item["nombre"]), strtoupper($texto)));
    }

    $productos = array_sort($productos, "precio", "SORT_" .$orden);
    $totalPaginas = ceil(count($productos) / $resultadosPorPagina);

    if ($pagina < 1) {
        $pagina = 1;
    } elseif ($pagina > $totalPaginas) {
        $pagina = $totalPaginas;
    }

    $indice_inicio = ($pagina - 1) * $resultadosPorPagina;
    $productos = array_slice($productos, $indice_inicio, $resultadosPorPagina);
    $output = '<div class="container my-5">';
    
    if (count($productos) > 0) {
        $output .= '<div class="row">';

        foreach ($productos as $producto) {
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

        $output .= '</div>';
        $output .= '<div class="row my-3">';
        $output .= '<div class="col text-center">';
        $output .= '<div class="btn-group" role="group">';

        for ($i=1; $i<=$totalPaginas; $i++) {
            $output .= '<a href="' .URL_BASE .'/shop?texto=' .$texto .'&orden=' .$orden .'&pagina=' .$i .'" class="btn btn-primary">' .$i .'</a>';
        }

        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';
    } else {
        $output .= '<div class="row">';
        $output .= '<div class="col text-center my-5">
        <h1 class="fw-bold">Error!</h1>
        <h3 class="fw-light">No se encontraron Productos con ese filtro!</h3>
        </div>';
        $output .= '</div>';
    }

    $output .= '</div>';
    echo $output; 
}