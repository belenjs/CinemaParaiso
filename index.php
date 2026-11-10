<?php

require_once __DIR__ . '/includes/configuracion.php';
require_once __DIR__ . '/includes/peliculas.php';

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

            <form action="agregar.php" method="post">
                <input type="hidden" name="pelicula_id" value="<?= (int)$id ?>">
                <button  class="button button-primary" type="submit">Reservar entrada</button>
            </form>
        </article>

        
        <?php endforeach; ?>
</div>
<?php pie(); ?>
    