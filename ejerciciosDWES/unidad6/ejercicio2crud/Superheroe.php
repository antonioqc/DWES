<?php
//Importar modelo de abstracción de base de datos
require_once("DBAbstractModel.php");

class Superheroe extends DBAbstractModel
{
    //Construcción del modelo singleton.
    private static $instancia;
    public static function getInstancia()
    {
        if (!isset(self::$instancia)) { //estamos accediendo a una propiedad estatica de la clase, por eso los dos puntos.
            $miclase = __CLASS__; //te devuelve el nombre de la clase
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    public function __clone()
    {
        trigger_error("La clonación no es permitida!.", E_USER_ERROR);
    }

    private $id;
    private $nombre;
    private $velocidad;
    private $created_at;
    private $updated_at;

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setVelocidad($velocidad)
    {
        $this->velocidad = $velocidad;
    }

    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * Insert
     */
    public function set($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor; //crear una nueva variable con el nombre que viene en el indice
        }

        $this->query = "INSERT INTO superheroes(nombre,velocidad) VALUES (:nombre, :velocidad)";
        $this->parametros["nombre"] = $nombre;
        $this->parametros["velocidad"] = $velocidad;
        $this->get_results_from_query();
        $this->mensaje = "SH agregado correctamente";
    }

    /**
     * Select
     */
    public function get($id = "")
    {
        if ($id != " ") {
            $this->query =  "SELECT * FROM superheroes WHERE id = :id";
            //Cargamos los parámetros
            $this->parametros["id"] = $id;
            //Ejecutamos consulta que devuelve registros
            $this->get_results_from_query();
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = "Sh encontrado";
        } else {
            $this->mensaje = "Sh no encontrado";
        }
        return $this->rows;
    }

    /**
     * Update
     */
    public function edit($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor; 
        }

        $this->query = "UPDATE superheroes SET nombre=:nombre, velocidad=:velocidad WHERE id=:id";
        $this->parametros["nombre"] = $nombre; 
        $this->parametros["velocidad"] = $velocidad;
        $this->parametros["id"]=$id;
        $this->get_results_from_query();
        $this->mensaje = "SH modificado.";
    }

    /**
     * Delete
     */
    public function delete($id = "")
    {
        $this->query = "DELETE FROM superheroes WHERE id=:id";
        $this->parametros["id"] = $id; //propiedad de la clase abstracta. Array que contiene nombre, velocidad
        $this->get_results_from_query();
        $this->mensaje = "SH eliminado";
    }


    public function guardaenBD()
    {
        $this->query = "INSERT INTO superheroes(nombre,velocidad) VALUES (:nombre, :velocidad)";
        $this->parametros["nombre"] = $this->nombre;
        $this->parametros["velocidad"] = $this->velocidad;
        $this->get_results_from_query();
        $this->mensaje = "SH añadido";
    }

    
    public function getAll() {
        $this->query = "SELECT * FROM superheroes"; 
        $this->get_results_from_query();
        return $this->rows;
    }
}
