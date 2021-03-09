<?php
    require_once('class/DBAbstractModel.php');

    class Entradas extends DBAbstractModel{
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

        public function setEntrada($log_data = array())
        {
            $this->query = "INSERT INTO logs(usuario, descripcion, fecha_hora) VALUES (:usuario, :descripcion, :fecha_hora)";
            $this->parametros["usuario"] = $log_data["usuario"];
            $this->parametros["descripcion"] = $log_data["descripcion"];
            $this->parametros['fecha_hora']=date("Y-m-d H:i:s");
            $this->get_results_from_query();
            $this->close_connection();
            $this->mensaje = "";
        }

        public function getEntradas($user_data=""){
            $this->query = "SELECT * FROM entradas WHERE idObra=:idObra";
            $this->parametros['idObra']= $user_data;
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }
        public function getEntradasByEmail($user_data=""){
            $this->query = "SELECT * FROM entradas WHERE email=:email";
            $this->parametros['email']= $user_data;
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }
        public function getTarifa($user_data=""){
            $this->query = "SELECT * FROM tarifas WHERE idObra=:idObra";
            $this->parametros['idObra']= $user_data;
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }

        public function set($user_data = array()) {
            foreach ($user_data as $campo=>$valor) {
                $$campo = $valor;
            }
            $this->query = "INSERT INTO entradas (idObra, fila, columna, precio, email) 
            VALUES (:idObra, :fila, :columna, :precio, :email)";
            $this->parametros['idObra'] = $user_data["idObra"];
            $this->parametros['fila'] = $user_data["fila"];
            $this->parametros['columna'] = $user_data["columna"];
            $this->parametros['precio'] = $user_data["precio"];
            $this->parametros['email'] = $user_data["email"];
            $this->get_results_from_query();
            $this->close_connection();
        }
    }

?>