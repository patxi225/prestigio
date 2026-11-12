
<h1>TU CARRITO</h1>

<?php if (empty($productos)) { ?>

    <p>no has añamido nada</p>

<?php } else { ?>

    <div class="container-fluid productos">

        <?php
        $total = 0;

        foreach ($productos as $producto) {

            $subtotal = $producto->precioUnidad * $producto->cantidad;
            $total += $subtotal;
        ?>

            <div class="row producto">

                <div class="col-3">
                    <img src="img/<?php echo $producto->imagen; ?>"
                         alt="<?php echo $producto->nombre; ?>">
                </div>

                <div class="col-5">

                    <h2><?php echo $producto->nombre; ?></h2>

                    <?php if (!empty($producto->ingredientesSeleccionados)) { ?>

                        <p>Ingredientes extra:</p>

                        <?php foreach ($producto->ingredientesSeleccionados as $ingrediente) { ?>

                            <p>
                                <?php echo $ingrediente->nombre; ?>
                                +<?php echo number_format($ingrediente->precio_extra, 2, ',', '.'); ?> €
                            </p>

                        <?php } ?>

                        <p>
                            Precio de los extras:
                            <?php echo number_format($producto->precioIngredientes, 2, ',', '.'); ?>
                        </p>

                    <?php } ?>

                    <p>
                        Precio del plato:
                        <?php echo number_format($producto->precioUnidad, 2, ',', '.'); ?> €
                    </p>

                </div>

                <div class="col-2">

                    <form action="index.php?controller=producto&action=actualizarCantidad" method="POST">

                        <input type="hidden" name="id" value="<?php echo $producto->id; ?>">

                        <?php foreach ($producto->ingredientes as $idIngrediente) { ?>

                            <input type="hidden" name="ingredientes[]" value="<?php echo $idIngrediente; ?>">

                        <?php } ?>

                        <button type="submit" name="accion" value="disminuir">−</button>

                        <span><?php echo $producto->cantidad; ?></span>

                        <button type="submit" name="accion" value="aumentar">+</button>

                    </form>

                </div>

                <div class="col-1">

                    <form action="index.php?controller=producto&action=eliminarDelCarrito" method="POST">

                        <input type="hidden" name="id" value="<?php echo $producto->id; ?>">

                        <?php foreach ($producto->ingredientes as $idIngrediente) { ?>

                            <input type="hidden" name="ingredientes[]" value="<?php echo $idIngrediente; ?>">

                        <?php } ?>

                        <button type="submit">ELIMINAR</button>

                    </form>

                </div>

                <div class="col-1">

                    <p>
                        <?php echo number_format($subtotal, 2, ',', '.'); ?> €
                    </p>

                </div>

            </div>

        <?php } ?>

    </div>

    <h2>Total: <?php echo number_format($total, 2, ',', '.'); ?> €</h2>

    <button type="button">FINALIZAR COMPRA</button>

<?php } ?>
