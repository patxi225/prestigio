
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

<nav class="menu-categorias">

    <a href="#1">ENTRANTES</a>
    <a href="#2">PRIMEROS</a>
    <a href="#3">SEGUNDOS</a>
    <a href="#4">POSTRES</a>

</nav>


<section class="container-fluid">

    <?php $numero = 1; ?>
    <?php $categoriaActual = 0; ?>

    <?php foreach ($productos as $producto) { ?>

        <?php if ($producto->categoria_id != $categoriaActual) { ?>

            <h2 class="titulo-categoria" id="<?php echo $producto->categoria_id; ?>">
                <?php echo $categorias[$producto->categoria_id]; ?>
            </h2>

            <?php $categoriaActual = $producto->categoria_id; ?>

        <?php }
         ?>

        <div class="row producto align-items-center">

            <div class="col-4 col-md-2">
                <img src="img/<?php echo $producto->imagen; ?>"
                     alt="<?php echo $producto->nombre; ?>"
                     class="imagen-producto">
            </div>

            <div class="col-8 col-md-5">

                <span class="numero-producto">
                    <?php echo $numero; ?>
                </span>

                <h2><?php echo $producto->nombre; ?></h2>
                <p><?php echo $producto->descripcion; ?></p>

            </div>

            <div class="col-4 col-md-2">
                <p class="dorado">
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

        <?php $numero++; ?>

    <?php } ?>

    <div class="boton-carrito">
        <a href="index.php?controller=producto&action=verCarrito">
            TU CARRITO
        </a>
    </div>

</section>