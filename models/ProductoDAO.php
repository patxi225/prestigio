
<?php

require_once __DIR__ . "/../config/dataBase.php";

class ProductoDAO
{
    public static function getAll()
    {
        global $conexion;

        $sql = "SELECT
                    productos.id,
                    productos.nombre,
                    productos.descripcion,
                    productos.precio,
                    productos.imagen,
                    categorias.nombre AS categoria
                FROM productos
                INNER JOIN categorias
                    ON productos.categoria_id = categorias.id
                WHERE productos.activo = 1";

        $consulta = $conexion->query($sql);

        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        global $conexion;

        $sql = "SELECT *
                FROM productos
                WHERE id = :id";

        $consulta = $conexion->prepare($sql);
        $consulta->execute(["id" => $id]);

        return $consulta->fetch(PDO::FETCH_ASSOC);
    }

    public static function getIngredientes($id)
    {
        global $conexion;

        $sql = "SELECT
                    ingredientes.id,
                    ingredientes.nombre,
                    ingredientes.precio_extra
                FROM producto_ingrediente
                INNER JOIN ingredientes
                    ON producto_ingrediente.ingrediente_id = ingredientes.id
                WHERE producto_ingrediente.producto_id = :id
                AND ingredientes.activo = 1";

        $consulta = $conexion->prepare($sql);
        $consulta->execute(["id" => $id]);

        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
}
