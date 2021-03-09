<!--
    Clase Logs
-->

<?php
    require_once('DBAbstractModel.php');
    

    class Log extends DBAbstractModel{
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
        * función get para obtener los logs de la base de datos.
        */
        public function get($log='') {
            if($log != '') {
                $this->query = "
                    SELECT  *
                    FROM logs 
                    WHERE usuario = :usuario";
                $this->parametros['usuario']= $log;	
                $this->get_results_from_query();
                $this->close_connection();
                $this->mensaje="error.";
            }
            return $this->rows;
        }

        /**
         * Función get la cual obtendrá todo la info de un log
         */ 
        public function getLog(){
            $this->query ="SELECT *
                    FROM logs
                    ORDER BY fecha_hora DESC";
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }


        /**Función set para introducir un log en la base de datos */
        public function set($log_data=array()) {
            
            $this->query = "INSERT INTO logs
                            (fecha_hora,usuario,descripcion)
                            VALUES
                            (:fecha_hora,:usuario,:descripcion)";
            $this->parametros['fecha_hora']=date("Y-m-d H:i:s");
            $this->parametros['usuario']=$log_data['usuario'];
            $this->parametros['descripcion']=$log_data['descripcion'];
            $this->get_results_from_query();
            $this->close_connection();
            $this->mensaje = 'log completado';
            
        }
    }

?>