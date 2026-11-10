<?php

require_once __DIR__ . '/includes/configuracion.php';
require_once __DIR__ . '/includes/peliculas.php';

$id = filter_input(
    INPUT_POST,
    'pelicula_id',
    FILTER_VALIDATE_INT
);

if ($id === false || $id === null || !isset($peliculas[$id])) {
    http_response_code(400);
    exit('Película no válida');
}

$actual = (int) ($_SESSION['entradas'][$id] ?? 0);

$_SESSION['entradas'][$id] = min($actual + 1, 99);

volver('entradas.php');