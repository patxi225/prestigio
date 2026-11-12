
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

    $categorias = [1 => "ENTRANTES", 2 => "PRIMEROS", 3 => "SEGUNDOS", 4 => "POSTRES" ];

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
    $total = 0;

    foreach ($_SESSION["carrito"] as $item) {

        $producto = ProductoDAO::getById($item["id"]);

        if ($producto) {

            $producto->cantidad = $item["cantidad"];
            $producto->ingredientes = $item["ingredientes"];

            $producto->precioIngredientes = 0;
            $producto->ingredientesSeleccionados = [];

            foreach ($item["ingredientes"] as $id) {

                global $conexion;

                $consulta = $conexion->prepare(
                    "SELECT * FROM ingredientes WHERE id = :id"
                );

                $consulta->execute(["id" => $id]);

                $ingrediente = $consulta->fetchObject();

                if ($ingrediente) {
                    $producto->precioIngredientes += $ingrediente->precio_extra;
                    $producto->ingredientesSeleccionados[] = $ingrediente;
                }
            }

            $producto->precioUnidad = $producto->precio + $producto->precioIngredientes;
            $producto->subtotal = $producto->precioUnidad * $producto->cantidad;

            $total += $producto->subtotal;

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

    $ingredientes = $_POST["ingredientes"] ?? [];

    $clave = $id . "_" . implode("-", $ingredientes);

    if (isset($_SESSION["carrito"][$clave])) {

        if ($accion == "aumentar") {
            $_SESSION["carrito"][$clave]["cantidad"]++;
        } else if ($accion == "disminuir") {

            if ($_SESSION["carrito"][$clave]["cantidad"] > 1) {
                $_SESSION["carrito"][$clave]["cantidad"]--;
            }
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
