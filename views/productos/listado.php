
<section class="encabezado-carta">

    <div class="contenido-encabezado-carta">
        <h3>NUESTRA CARTA</h3>
        <h1>
            AUTÉNTICA COCINA<br>
            ITALIANA
        </h1>


        <p>Tradición, producto y pasión en cada plato.</p>



    </div>

</section>

<section class="container-fluid">

    <?php if (empty($productos)) { ?>

        <p>No hay productos disponibles.</p>

    <?php } else { ?>

        <?php foreach ($productos as $producto) { ?>

            <div class="row producto align-items-center">

                <div class="col-4 col-md-2">
                    <img src="img/<?php echo $producto->imagen; ?>"
                         alt="<?php echo $producto->nombre; ?>"
                         class="imagen-producto">
                </div>

                <div class="col-8 col-md-5">

                
                    <h2><?php echo $producto->nombre; ?></h2>
                    <p><?php echo $producto->descripcion; ?></p>
                </div>

                <div class="col-4 col-md-2">
                    <p class=" dorado">
                        <?php echo $producto->precio; ?> €
                    </p>
                </div>

                <div class="col-8 col-md-3">

                    <a href="index.php?controller=producto&action=show&id=<?php echo $producto->id; ?>"
                       class="boton-detalles">

                        <b>VER DETALLES</b>
                    </a>

                    <form action="index.php?controller=producto&action=addToCart" method="POST">

                        <input type="hidden" name="id"

                               value="<?php echo $producto->id; ?>">

                        <button type="submit" class="boton-anadir">


                            <b>AÑADIR</b>
                                <img src="img/carrito2.svg" alt="">
                        </button>

                    </form>

                </div>

            </div>

        <?php } ?>

        <div class="boton-carrito">
            <a href="index.php?controller=producto&action=verCarrito">
                TU CARRITO
            </a>
        </div>

    <?php } ?>

</section>
