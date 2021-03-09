<?php
    require_once('class/DBAbstractModel.php');

    class Tarifas extends DBAbstractModel{
        private static $instancia;

        public static function getInstancia() {
            if (!isset(self::$instancia)) {
                $miClase = __CLASS__;
                self::$instancia = new $miClase;
            }
            return self::$instancia;
        }

        public function __clone() {
            trigger_error('La clonación no es permitida.', E_USER_ERROR);
        }

        public function getMensaje() {
            return $this->mensaje;
        } 

        // public function getPrecioTarifas(){
        //     $this->query = "SELECT * FROM tarifas";
        //     $this->get_results_from_query();
        //     $this->close_connection();
        //     return $this->rows;
        // }

        public function getPrecioTarifas(){
            $this->query = "SELECT * FROM tarifas"; 
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }
    }

?>