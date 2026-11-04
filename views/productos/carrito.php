
<?php
require_once __DIR__ . "/../../config/dataBase.php";
global $conexion;
?>

<h1>TU CARRITO</h1>

<?php if (empty($productos)) { ?>

    <p>Tu carrito está vacío.</p>

<?php } else { ?>

    <div class="productos">

        <?php
        $total = 0;

        foreach ($productos as $producto) {

            $precioIngredientes = 0;
            $ingredientesSeleccionados = [];

            foreach ($producto["ingredientes"] as $idIngrediente) {

                $consulta = $conexion->prepare(
                    "SELECT nombre, precio_extra
                     FROM ingredientes
                     WHERE id = :id"
                );

                $consulta->execute(["id" => $idIngrediente]);

                $ingrediente = $consulta->fetch(PDO::FETCH_ASSOC);

                if ($ingrediente) {
                    $precioIngredientes += $ingrediente["precio_extra"];
                    $ingredientesSeleccionados[] = $ingrediente;
                }
            }

            $precioUnidad = $producto["precio"] + $precioIngredientes;

            $subtotal = $precioUnidad * $producto["cantidad"];

            $total += $subtotal;
        ?>

            <div class="producto">

                <img src="img/<?php echo $producto['imagen']; ?>"
                     alt="<?php echo $producto['nombre']; ?>">

                <h2><?php echo $producto["nombre"]; ?></h2>

                <p>Precio del plato:
                    <?php echo number_format($producto["precio"], 2, ',', '.'); ?> €
                </p>

                <?php if (!empty($ingredientesSeleccionados)) { ?>

                    <p>Ingredientes adicionales:</p>

                    <?php foreach ($ingredientesSeleccionados as $ingrediente) { ?>

                        <p>
                            <?php echo $ingrediente["nombre"]; ?>
                            (+<?php echo number_format($ingrediente["precio_extra"], 2, ',', '.'); ?> €)
                        </p>

                    <?php } ?>

                    <p>Precio de los adicionales:
                        <?php echo number_format($precioIngredientes, 2, ',', '.'); ?> €
                    </p>

                <?php } ?>

                <p>Precio por unidad:
                    <?php echo number_format($precioUnidad, 2, ',', '.'); ?> €
                </p>

                <form action="index.php?controller=producto&action=actualizarCantidad" method="POST">

                    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">

                    <?php foreach ($producto["ingredientes"] as $idIngrediente) { ?>

                        <input type="hidden" name="ingredientes[]" value="<?php echo $idIngrediente; ?>">

                    <?php } ?>

                    <button type="submit" name="accion" value="disminuir">−</button>

                    <span><?php echo $producto["cantidad"]; ?></span>

                    <button type="submit" name="accion" value="aumentar">+</button>

                </form>

                <form action="index.php?controller=producto&action=eliminarDelCarrito" method="POST">

                    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">

                    <?php foreach ($producto["ingredientes"] as $idIngrediente) { ?>

                        <input type="hidden" name="ingredientes[]" value="<?php echo $idIngrediente; ?>">

                    <?php } ?>

                    <button type="submit">ELIMINAR</button>

                </form>

                <p>Subtotal:
                    <?php echo number_format($subtotal, 2, ',', '.'); ?> €
                </p>

            </div>

        <?php } ?>

    </div>

    <h2>Total: <?php echo number_format($total, 2, ',', '.'); ?> €</h2>

    <button type="button">FINALIZAR COMPRA</button>

<?php } ?>
