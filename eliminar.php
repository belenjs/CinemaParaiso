<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/configuracion.php';
require_once __DIR__ . '/includes/peliculas.php';

exigirPostValido();
exigirCsrfValido();

$id = filter_input(
    INPUT_POST,
    'pelicula_id',
    FILTER_VALIDATE_INT
);

if ($id === false || $id === null || !isset($peliculas[$id])) {
    http_response_code(400);
    exit('Identificador no válido');
}

unset($_SESSION['entradas'][$id]);
volver('entradas.php');