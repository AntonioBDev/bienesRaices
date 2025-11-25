<?php

namespace App;

class Propiedad
{
    private static $db;

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitacion;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitacion = $args['habitacion'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? '';
    }

    public function guardar()
    {
        //Insertar en la base de datos 
        $query = "INSERT INTO propiedades(titulo, precio, imagen, descripcion, habitacion, wc, estacionamiento, creado, vendedores_id) VALUE ('$this->titulo', '$this->precio','$this->imagen', '$this->descripcion', '$this->habitacion', '$this->wc', '$this->estacionamiento', '$this->creado','$this->vendedores_id');";

        $resultado = self::$db->query($query);
        debuguear($resultado);
        exit;
    }

    public static function setDB($dataBase)
    {
        //referencia a la base de datos
        self::$db = $dataBase;
    }
}
