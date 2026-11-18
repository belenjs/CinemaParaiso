<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/configuracion.php';
require_once __DIR__ . '/includes/peliculas.php';

exigirPostValido();
exigirCsrfValido();

$_SESSION['entradas'] = [];

volver('carrito.php');

?>