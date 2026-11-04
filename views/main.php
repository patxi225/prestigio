
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PRESTIGIO — Cocina Italiana</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            line-height: 1.5;
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
