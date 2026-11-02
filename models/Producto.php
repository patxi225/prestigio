
<?php

abstract class Producto
{
    protected $id;
    protected $nombre;
    protected $descripcion;
    protected $precio;
    protected $categoria;

    public function __construct($nombre = null, $descripcion = null, $precio = null, $categoria = null)
    {
        if ($nombre !== null) {
            $this->nombre = $nombre;
        }

        if ($descripcion !== null) {
            $this->descripcion = $descripcion;
        }

        if ($precio !== null) {
            $this->precio = $precio;
        }

        if ($categoria !== null) {
            $this->categoria = $categoria;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }
}
