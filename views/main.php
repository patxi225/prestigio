<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PRESTIGIO</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/estilos.css?v7">
</head>

<body>
    <header class="header">



        <div class="header-contenido">


            <a href="index.php?controller=producto&action=index" class="header-menu">
                <span class="icono-menu">☰</span>
                <span>MENÚ</span>
            </a>
            <div class="header-logo">
                <a href="inicio.html">
                    <img src="img/logo-prestigio.png" alt="PRESTIGIO">
                </a>
            </div>
            <div class="header-carrito">
                <a href="index.php?controller=producto&action=verCarrito">
                    <img src="img/carrito.svg" alt="Carrito">
                </a>
            </div>



        </div>

    </header>

    <main>
        <?php include_once $view; ?>
    </main>


    <footer class="footer">

        <div class="container">

            <div class="row">

                <div class="col-6 col-md-3">
                    <h3>RESTAURANTE</h3>
                    <a href="#">NUESTRA HISTORIA</a>
                    <a href="#">NUESTRA COCINA</a>
                    <a href="#">TRABAJA CON NOSOTROS</a>
                </div>

                <div class="col-6 col-md-3">
                    <h3>EXPLORA</h3>
                    <a href="index.php?controller=producto&action=index">LA CARTA</a>
                    <a href="#">EL RESTAURANTE</a>
                    <a href="#">RESERVA</a>
                </div>

                <div class="col-6 col-md-3">
                    <h3>INFORMACIÓN</h3>
                    <a href="#">PRIVACIDAD</a>
                    <a href="#">AVISO LEGAL</a>
                    <a href="#">CONTACTO</a>
                </div>

                <div class="col-6 col-md-3">
                    <h3>SÍGUENOS</h3>

                    <div class="redes-sociales">
                        <a href="#"><img src="img/instagram.svg" alt=""></a>
                        <a href="#"><img src="img/facebook.svg" alt=""></a>
                        <a href="#"><img src="img/youtube.svg" alt=""></a>
                        <a href="#"><img src="img/tiktok.svg" alt=""></a>
                    </div>

                    <div class="direccion-footer">
                        CALLE MAYOR, 113
                    </div>
                </div>

            </div>

        </div>

    </footer>

</body>
</html>