<?php
    require_once('DBAbstractModel.php');
    
    class Log extends DBAbstractModel {
        private static $instancia;

        private $id;
        private $usuario;
        private $fecha_hora;
        private $descripcion;
 
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
        public function edit($user_data=array()) {
            
        }
        public function get(){
            $this->query = "SELECT * FROM logs ORDER BY fecha_hora DESC";
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }

        public function set($user_data = array()) {
            foreach ($user_data as $campo=>$valor) {
                $$campo = $valor;
            }
            $this->query = "INSERT INTO logs (fecha_hora, usuario, descripcion) VALUES (:fecha_hora, :usuario, :descripcion)";
            $this->parametros['fecha_hora']=$fecha_hora;
            $this->parametros['usuario']=$usuario;
            $this->parametros['descripcion']=$descripcion;
            $this->get_results_from_query();
            $this->close_connection();
        }
        public function delete($id="") {
            $this->query = "DELETE FROM clavefirma WHERE id = :id";
            $this->parametros['id']=$id;
            $this->get_results_from_query();
            $this->close_connection();
            $this->mensaje = 'Clave firma eliminada';
        }
        function __construct() {
            $this->db_name = 'book_example';
        }
        function __destruct() {
            $this->conn = null;
        }
    }
?>