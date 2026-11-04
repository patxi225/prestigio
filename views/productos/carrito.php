


<h1>TU CARRITO</h1>


<?php if (empty($productos)) { ?>

    <p>Tu carrito está vacío.</p>

<?php } else { ?>

    <div class="productos">

        <?php
        $total = 0;

        foreach ($productos as $producto) {

            $subtotal = $producto["precio"] * $producto["cantidad"];
            $total = $total + $subtotal;
        ?>

            <div class="producto">

                <img src="img/<?php echo $producto['imagen']; ?>"
                     alt="<?php echo $producto['nombre']; ?>">

                <h2><?php echo $producto["nombre"]; ?></h2>

                <p>Precio: <?php echo $producto["precio"]; ?> €</p>

                <form action="index.php?controller=producto&action=actualizarCantidad" method="POST">

                    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">

                    <button type="submit" name="accion" value="disminuir">−</button>

                    <span><?php echo $producto["cantidad"]; ?></span>

                    <button type="submit" name="accion" value="aumentar">+</button>

                </form>

                <p>Subtotal: <?php echo number_format($subtotal, 2); ?> €</p>

            </div>

        <?php } ?>

    </div>

    <h2>Total: <?php echo number_format($total, 2); ?> €</h2>

<?php } ?>
