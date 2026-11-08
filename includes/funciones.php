<?php

declare(strict_types=1);

function escapar(string $texto): string {
    return htmlspecialchars($texto, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function formatearEuros(float $cantidad): string {
    return number_format($cantidad, 2, ',', '.') . ' €';
}

function cabecera(string $titulo): void {
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> <?= escapar($titulo) ?> | Cinema Paraíso </title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
    <header class="cabecera">
        <div class="contenedor navbar">
            <a class="marca" href="index.php">Cinema Paraíso</a>
            <nav aria-label="Navegación principal">
                <a href="index.php">Cartelera</a>
                <a href="index.php">Mis Entradas</a>
                <a href="index.php">Preferencias</a>
                <a href="index.php">Sesión</a>
            </nav>
        </div>
    </header>
    <main class="contenedor">
    <?php
}

function pie(): void {
    ?>
    </main>
    <footer class="pie">
        Proyecto didáctico de DAW - Belén Jiménez Sánchez
    </footer>
    
    </body>
    </html>
    <?php
}