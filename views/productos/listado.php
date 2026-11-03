<h1>Productos de PRESTIGIO</h1>

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

            </div>

        <?php } ?>

    </div>

<?php } ?>
