<?php
    require_once('class/DBAbstractModel.php');

    class Logs extends DBAbstractModel{
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

        public function setLogs($log_data = array())
        {
            $this->query = "INSERT INTO logs(usuario, descripcion, fecha_hora) VALUES (:usuario, :descripcion, :fecha_hora)";
            $this->parametros["usuario"] = $log_data["usuario"];
            $this->parametros["descripcion"] = $log_data["descripcion"];
            $this->parametros['fecha_hora']=date("Y-m-d H:i:s");
            $this->get_results_from_query();
            $this->close_connection();
            $this->mensaje = "";
        }


        public function getLogs(){
            $this->query = "SELECT * FROM logs order by id desc";
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }
    }

?>