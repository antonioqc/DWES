<!--
    Clase Serie
-->

<?php
    require_once('DBAbstractModel.php');
    
    class Serie extends DBAbstractModel{
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
         * Función get la cual obtendrá el usuario a través de su id
         */ 
        public function getSerie(){
            $this->query = "SELECT * FROM series ORDER BY numero_reproducciones DESC";
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }

        /**
         * Función que aumenta en 1 al visualizar una serie.
         */

        public function visualizarSerie($serie_data=array()){
            $this->query = "UPDATE series
                            SET numero_reproducciones=:numero_reproducciones
                            WHERE
                            id = :id";
            $this->parametros['id'] = $serie_data['id'];
            $this->parametros['numero_reproducciones'] = $serie_data['numero_reproducciones'];
            $this->get_results_from_query();
            $this->close_connection();
        }

        /**
         * Función para obtener el numero de reproducciones de una serie.
         */

        public function getNumeroReproducciones($id){
            $this->query = "SELECT numero_reproducciones FROM series WHERE id=:id";
            $this->parametros['id']=$id;  
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }

    }

?>