
<?php

include_once __DIR__ . "/../models/ProductoDAO.php";
include_once __DIR__ . "/../models/Producto.php";

class ProductoController
{
    public function index()
    {
        $productos = ProductoDAO::getAll();
        $view = __DIR__ . "/../views/productos/listado.php";
        include_once __DIR__ . "/../views/main.php";
    }

    public function addToCart()
    {
        if (isset($_POST["id"])) {

            $id = $_POST["id"];

            $producto = ProductoDAO::getById($id);

            if ($producto) {

                if (!isset($_SESSION["carrito"])) {
                    $_SESSION["carrito"] = [];
                }

                if (isset($_SESSION["carrito"][$id])) {
                    $_SESSION["carrito"][$id]++;
                } else {
                    $_SESSION["carrito"][$id] = 1;
                }
            }
        }


        header("Location: index.php");
        exit;
    }

    public function verCarrito()
{
    $productos = [];

    if (isset($_SESSION["carrito"])) {

        foreach ($_SESSION["carrito"] as $id => $cantidad) {

            $producto = ProductoDAO::getById($id);

            if ($producto) {
                $producto["cantidad"] = $cantidad;
                $productos[] = $producto;
            }
        }
    }


    $view = __DIR__ . "/../views/productos/carrito.php";
    include_once __DIR__ . "/../views/main.php";
}

public function actualizarCantidad()
{
    if (isset($_POST["id"]) && isset($_POST["accion"])) {

        $id = $_POST["id"];
        $accion = $_POST["accion"];

        if (isset($_SESSION["carrito"][$id])) {

            if ($accion == "aumentar") {
                $_SESSION["carrito"][$id]++;
            }

            if ($accion == "disminuir") {

                if ($_SESSION["carrito"][$id] > 1) {
                    $_SESSION["carrito"][$id]--;
                }
            }
        }
    }

    header("Location: index.php?controller=producto&action=verCarrito");
    exit;
}
}
