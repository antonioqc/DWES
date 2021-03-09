<!--
    Clase Entrada
-->

<?php
    require_once('DBAbstractModel.php');
    

    class Entrada extends DBAbstractModel{
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

        public function getMensaje(){
            return $this->mensaje;
        }

        /**
         * Función para obtener zonas de entradas
         */

       public function getPrecioZonas($id){
            $this->query = "SELECT * FROM tarifas WHERE idObra = :idObra ";
            $this->parametros['idObra']=$id;
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        } 
     
    }

?>