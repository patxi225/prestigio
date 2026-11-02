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
}