<?php
require_once __DIR__ . '/includes/peliculas.php';
require_once __DIR__ . '/includes/funciones.php';
cabecera('Cartelera');
?>

<section class="intro">
    <p class="etiqueta">Proyecto DAW - Entorno Servidor</p>
    <h1>Cartelera</h1>
    <p>¿Te adentras en el fantástico mundo del cine?</p>
</section>
<div class="peliculas">
    <?php foreach($peliculas as $id => $pelicula): ?>
        <article class="tarjeta">
            <div class="ilustracion" aria-hidden="true"> <?= escapar($pelicula['icono']) ?> </div>
            <h2> <?= escapar($pelicula['titulo']) ?> </h2>
            <p class="precio"> <?= formatearEuros($pelicula['precio']) ?> </p>
        </article>
        <?php endforeach; ?>
</div>
<?php pie(); ?>
    