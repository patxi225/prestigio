
<h3>NUESTRA CARTA</h3>

<h1>AUTÉNTICA COCINA ITALIANA</h1>
<p>Tradición, producto y pasión en cada plato.</p>

<?php if (empty($productos)) { ?>

    <p>No hay productos disponibles.</p>

<?php } else { ?>

    <div class="productos">

        <?php foreach ($productos as $producto) { ?>

            <div class="producto">

                <img src="img/<?php echo $producto['imagen']; ?>"
                     alt="<?php echo $producto['nombre']; ?>">

                <h2><?php echo $producto['nombre']; ?></h2>

                <p><?php echo $producto['descripcion']; ?></p>

                <p><?php echo $producto['precio']; ?> €</p>

                <a href="index.php?controller=producto&action=show&id=<?php echo $producto['id']; ?>">
                    VER DETALLES
                </a>

                <form action="index.php?controller=producto&action=addToCart" method="POST">

                    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">

                    <button type="submit">AÑADIR</button>

                </form>

            </div>

        <?php } ?>

        <a href="index.php?controller=producto&action=verCarrito">
            TU CARRITO
        </a>

    </div>

<?php } ?>
