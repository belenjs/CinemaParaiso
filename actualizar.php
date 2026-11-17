<?php

require_once __DIR__ . '/includes/configuracion.php';
require_once __DIR__ . '/includes/peliculas.php';

cabecera('Actualizar');

$id = filter_input(
    INPUT_POST,
    'pelicula_id',
    FILTER_VALIDATE_INT
);

$cantidad = filter_input(
    INPUT_POST,
    'cantidad',
    FILTER_VALIDATE_INT
);

if ($id === false || $id === null || !isset($peliculas[$id])) {
    http_response_code(400);
    exit('Película no válida');
}

if ($cantidad === false || $cantidad === null || $cantidad < 0 || $cantidad > 99) {
    http_response_code(400);
    exit('Cantidad no válida');
}

if ($cantidad === 0) {
    unset($_SESSION['entradas'][$id]);
} else {
    $_SESSION['entradas'][$id] = $cantidad;
}

volver('entradas.php');

?>