<?php

namespace App;

class Propiedad
{
    protected static $db;
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitacion', 'wc', 'estacionamiento', 'creado', 'vendedores_id'];

    //Validar Errores
    protected static $errores = [];

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

    //Definir la conexion a la base de datos
    public static function setDB($dataBase)
    {
        //referencia a la base de datos
        self::$db = $dataBase;
    }

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
        //sanitizar los datos
        $atributos = $this->sanitizarAtributos(); //manera de llamar a un metodo dentro de un metodo

        //Insertar en la base de datos 
        $query = "INSERT INTO propiedades(";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUE (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ');";

        $resultado = self::$db->query($query);
        return $resultado;
    }
    //Encargado de iterar los atributos de la BD
    //Identificar y unir los atributos de la BD
    public function atributos()
    {
        $atributos = [];
        foreach (self::$columnasDB as $columna) {
            if ($columna === 'id') continue; //No incluir el id
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];

        //arreglo asociativo
        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    public static function getErrores()
    {
        return self::$errores;
    }

    public function validar()
    {
        if (!$this->titulo) {
            self::$errores[] = 'Debes añadir un titulo';
        }
        if (!$this->precio) {
            self::$errores[] = 'El precio es obligatorio';
        }
        if (strlen($this->descripcion) < 50) {
            self::$errores[] = 'La descripción es obligatorio y debe tener al menos 50 caracteres';
        }
        if (!$this->habitacion) {
            self::$errores[] = 'El número de habitaciones es obligatorio';
        }
        if (!$this->wc) {
            self::$errores[] = 'El número de Baños es obligatorio';
        }
        if (!$this->estacionamiento) {
            self::$errores[] = 'El número de lugares de estacionamiento es obligatorio';
        }
        if (!$this->vendedores_id) {
            self::$errores[] = 'Elige un vendedor';
        }


        if (!$this->imagen) {
            self::$errores[] = 'La imagen es obligatoria';
        }

        return self::$errores;
    }

    public function setImagen($imagen)
    {
        //Asignar al atributo de imagen el nombre de la imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    //Lista todas las propiedades
    public static function all()
    {
        $query = "SELECT * FROM propiedades";
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    public static function consultarSQL($query){
        //Consultar la base de datos
        $resultado = self::$db->query($query);

        //Iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = self::crearObjeto($registro);
        }
        //Liberar la memoria
        $resultado->free();

        //Retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new self;

        foreach($registro as $key => $value){
            if(property_exists($objeto, $key)){
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }
}
