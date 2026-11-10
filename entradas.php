<?php

require_once __DIR__ . '/includes/configuracion.php';
require_once __DIR__ . '/includes/peliculas.php';

cabecera('Mis entradas');
?>

<section class="intro">
    <p class="etiqueta">ESTADO DE LAS RESERVAS</p>
    <h1>Tus entradas</h1>
</section>

<?php if (empty($_SESSION['entradas'])): ?>

    <div class="panel">
        <p>Tu reserva está vacío.</p>

        <a class="boton" href="index.php">
            Ir a la cartelera
        </a>
    </div>

<?php else: ?>

    <div>
        <table class="panel">
            <thead>
                <tr>
                    <th>Pelicula</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['entradas'] as $id => $cantidad): ?>
                    <?php if (!isset($peliculas[$id])) continue; ?>
                    <?php $pelicula = $peliculas[$id]; ?>
                    <tr>
                        <td>
                            <?= escapar($pelicula['titulo']) ?>
                        </td>
                        <td>
                            <?= formatearEuros($pelicula['precio']) ?>
                        </td>
                        <td>
                        <form
                            action="actualizar.php"
                            method="post"
                            class="en-linea"
                        >
                        <?= campoCsrf() ?>
                        <input
                                type="hidden"
                                name="pelicula_id"
                                value="<?= (int)$id ?>"
                        >
                        <input
                                type="number"
                                name="cantidad"
                                value="<?= (int)$cantidad ?>"
                                min="0"
                                max="99"
                                aria-label="Cantidad de <?= escapar($pelicula['titulo']) ?>"
                        >
                        <button class="boton boton-actualizar" type="submit">
                                Actualizar
                            </button>

                        </form>
                        </td>
                        <td>
                            <?= formatearEuros($pelicula['precio'] * (int)$cantidad) ?>
                        </td>
                        <td>
                            <form
                                action="eliminar.php"
                                method="post">

                                <?= campoCsrf() ?>

                                <input 
                                    type="hidden"
                                    name="pelicula_id"
                                    value="<?= (int)$id ?>">
                                <button type="submit" class="peligro">Eliminar</button>

                            </form>
                        </td>
                    </tr>

                    <?php endforeach; ?>
            </tbody>
        </table>

        <p class="total">Total: <?= formatearEuros(totalReserva($peliculas)) ?></p>

        <form
            class="form-secundario"
            action="vaciar.php"
            method="post"
            >
            <?= campoCsrf() ?>
            <button type="submit" class="secundario">Vaciar reserva</button>
        </form>
            

    </div>

    <?php endif; ?>

    <?php

    ?>

    <?php pie(); ?>