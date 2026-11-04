
<?php

include_once __DIR__ . "/../models/ProductoDAO.php";
include_once __DIR__ . "/../models/Producto.php";

class ProductoController
{
    private function normalizarCarrito()
    {
        if (!isset($_SESSION["carrito"])) {
            $_SESSION["carrito"] = [];
        }

        $carritoNuevo = [];

        foreach ($_SESSION["carrito"] as $id => $item) {

            if (is_array($item)) {

                $carritoNuevo[$id] = $item;

            } else {

                $clave = $id . "_";

                $carritoNuevo[$clave] = [
                    "id" => $id,
                    "cantidad" => $item,
                    "ingredientes" => []
                ];

            }

        }

        $_SESSION["carrito"] = $carritoNuevo;
    }

    public function index()
    {
        $productos = ProductoDAO::getAll();

        $view = __DIR__ . "/../views/productos/listado.php";

        include_once __DIR__ . "/../views/main.php";
    }

    public function addToCart()
    {
        $this->normalizarCarrito();

        $id = $_POST["id"];

        $ingredientes = [];

        if (isset($_POST["ingredientes"])) {
            $ingredientes = $_POST["ingredientes"];
        }

        $clave = $id . "_" . implode("-", $ingredientes);

        if (isset($_SESSION["carrito"][$clave])) {

            $_SESSION["carrito"][$clave]["cantidad"]++;

        } else {

            $_SESSION["carrito"][$clave] = [
                "id" => $id,
                "cantidad" => 1,
                "ingredientes" => $ingredientes
            ];

        }

        header("Location: index.php?controller=producto&action=verCarrito");
        exit;
    }

    public function verCarrito()
    {
        $this->normalizarCarrito();

        $productos = [];

        foreach ($_SESSION["carrito"] as $item) {

            $producto = ProductoDAO::getById($item["id"]);

            if ($producto) {

                $producto["cantidad"] = $item["cantidad"];
                $producto["ingredientes"] = $item["ingredientes"];

                $productos[] = $producto;

            }

        }

        $view = __DIR__ . "/../views/productos/carrito.php";

        include __DIR__ . "/../views/main.php";
    }

    public function actualizarCantidad()
    {
        $this->normalizarCarrito();

        $id = $_POST["id"];
        $accion = $_POST["accion"];

        $ingredientes = [];

        if (isset($_POST["ingredientes"])) {
            $ingredientes = $_POST["ingredientes"];
        }

        $clave = $id . "_" . implode("-", $ingredientes);

        if (isset($_SESSION["carrito"][$clave])) {

            if ($accion == "aumentar") {
                $_SESSION["carrito"][$clave]["cantidad"]++;
            }

            if ($accion == "disminuir" && $_SESSION["carrito"][$clave]["cantidad"] > 1) {
                $_SESSION["carrito"][$clave]["cantidad"]--;
            }

        }

        header("Location: index.php?controller=producto&action=verCarrito");
        exit;
    }

    public function eliminarDelCarrito()
    {
        $this->normalizarCarrito();

        $id = $_POST["id"];

        $ingredientes = [];

        if (isset($_POST["ingredientes"])) {
            $ingredientes = $_POST["ingredientes"];
        }

        $clave = $id . "_" . implode("-", $ingredientes);

        if (isset($_SESSION["carrito"][$clave])) {
            unset($_SESSION["carrito"][$clave]);
        }

        header("Location: index.php?controller=producto&action=verCarrito");
        exit;
    }

    public function show()
    {
        $id = $_GET["id"];

        $producto = ProductoDAO::getById($id);

        if ($producto) {

            $ingredientes = ProductoDAO::getIngredientes($id);

            $view = __DIR__ . "/../views/productos/show.php";

            include __DIR__ . "/../views/main.php";

        } else {

            echo "Producto no encontrado.";

        }
    }
}
