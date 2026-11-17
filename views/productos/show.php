
<h1>DETALLES PRODUCTO</h1>

<p>
    <a href="index.php">Volver a la carta</a>
</p>

<div class="detalle-producto">

<img src="img/<?php echo $producto->imagen; ?>" alt="<?php echo $producto->nombre; ?>">

<h2>
    <?php echo $producto->nombre; ?>
</h2>

<p>
    <?php echo $producto->descripcion; ?>
</p>

    <p>
        <strong>Precio:</strong>
        <?php echo number_format((float) $producto->precio, 2, ',', '.'); ?> €
    </p>

    <form action="index.php?controller=producto&action=addToCart" method="POST">

        <input type="hidden" name="id" value="<?php echo (int) $producto->id; ?>">

        <h3>INGREDIENTES EXTRA</h3>

        <?php foreach ($ingredientes as $ingrediente) { ?>

            <div>
                <label>
                    <input
                        type="checkbox"
                        name="ingredientes[]"
                        value="<?php echo $ingrediente->id; ?>"
                    >

                    <?php echo $ingrediente->nombre; ?>

                    +<?php echo number_format($ingrediente->precio_extra, 2, ',', '.'); ?> €
                </label>
            </div>

        <?php } ?>

        <button type="submit">AÑADIR AL CARRITO</button>

    </form>

</div>
