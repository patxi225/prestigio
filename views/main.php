
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PRESTIGIO — Cocina Italiana</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>

        @font-face {
            font-family: 'Lambotype';
            src: url('/prestigio/fonts/Lambotype-Variable.woff') format('woff');
            font-weight: 100 900;
            font-style: normal;
        }

        body {
            font-family: 'Lambotype', sans-serif;
            margin: 0;
            line-height: 1.5;
        }

        h1 {
            font-variation-settings: 'wght' 477, 'wdth' 50;
        }

        /* HEADER */

        .header {
            background-color: #202020;
            height: 95px;
            display: flex;
            align-items: center;
            padding: 0 5%;
        }

        .header-contenido {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            align-items: center;
            width: 100%;
        }

        .header-menu {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 15px;
            font-weight: bold;
            width: fit-content;
        }

        .header-menu:hover {
            color: #c6a568;
        }

        .header-logo {
            display: flex;
            justify-content: center;
        }

        .header-logo img {
            width: 135px;
            height: auto;
        }

        .header-carrito {
            display: flex;
            justify-content: flex-end;
        }

        .header-carrito a {
            color: white;
            font-size: 23px;
            text-decoration: none;
        }

        .header-carrito a:hover {
            color: #c6a568;
        }

        /* PRODUCTOS */

        .productos {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .producto {
            border: 1px solid #ccc;
            padding: 15px;
            width: 250px;
        }

        .producto img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        /* ENCABEZADO DE LA CARTA */

        
        .encabezado-carta {
            width: 100%;
            height: 400px;
            background: url('/prestigio/img/fondo-menu.png') center center / cover no-repeat;
            display: flex;
            align-items: center;
            padding: 0 8%;
            box-sizing: border-box;
        }

        .contenido-encabezado-carta {
            max-width: 550px;
        }

        .encabezado-carta h3 {
            display: flex;
            align-items: center;
            gap: 15px;
            color: #917300;
            font-size: 16px;
            font-weight: bold;
        }

        .encabezado-carta h3::before,
        .encabezado-carta h3::after {
            content: "";
            width: 45px;
            height: 1px;
            background-color: #917300;
        }

        .encabezado-carta h1 {
            color: #202020;
            font-size: 65px;
            font-weight: 500;
            margin-bottom: 12px;
        }

        .encabezado-carta p {
            color: #202020;
            font-size: 18px;
            margin: 0;
        }

        .contenedor-productos {
            padding: 50px 5%;
        }

        @media (max-width: 768px) {

            .encabezado-carta {
                height: 250px;
                padding: 0 6%;
                background-position: center;
            }

            .encabezado-carta h1 {
                font-size: 32px;
            }

            .encabezado-carta h3 {
                font-size: 13px;
            }

            .encabezado-carta p {
                font-size: 13px;
            }

        }


    </style>

</head>

<body>

    <header class="header">

        <div class="header-contenido">

            <!-- MENÚ -->
            <a href="index.php?controller=producto&action=index" class="header-menu">
                <i class="bi bi-list fs-3"></i>
                <span>MENÚ</span>
            </a>

            <!-- LOGO -->
            <div class="header-logo">
                <a href="inicio.html">
                    <img src="img/logo-prestigio.png" alt="PRESTIGIO">
                </a>
            </div>

            <!-- CARRITO -->
            <div class="header-carrito">
                <a href="index.php?controller=producto&action=verCarrito">
                    <i class="bi bi-cart3"></i>
                </a>
            </div>

        </div>

    </header>

    <main>
        <?php include_once $view; ?>
    </main>

</body>

</html>
