<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/configuracion.php';
require_once __DIR__ . '/includes/peliculas.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Método no permitido');
}

$_SESSION['entradas'] = [];

volver('carrito.php');

?>