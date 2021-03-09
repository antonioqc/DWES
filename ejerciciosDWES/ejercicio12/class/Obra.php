<?php
    require_once('DBAbstractModel.php');
    
    class Obra extends DBAbstractModel {
        private static $instancia;

        private $titulo;
        private $descripcion;
        private $portada;
        private $fecha_inicio;
        private $fecha_final;
        private $numero_valoraciones;
        private $valoracion_media;
 
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
            $this->query = "UPDATE obras SET numero_valoraciones=:numero_valoraciones, 
                valoracion_media=:valoracion_media WHERE id=:id";
            $this->parametros['id'] = $user_data["id"];
            $this->parametros['numero_valoraciones'] = $user_data["numero_valoraciones"];
            $this->parametros['valoracion_media'] = $user_data["valoracion_media"];
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }
        public function get($user_data=""){
            $this->query = "SELECT * FROM usuarios WHERE usuario=:usuario";
            $this->parametros['usuario']= $user_data;
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }
        public function getObras(){
            $this->query = "SELECT * FROM obras";
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }
        public function getObrasPasadas($user_data){
            $this->query = "SELECT * FROM obras WHERE fecha_final<:fecha_actual";
            $this->parametros['fecha_actual']= $user_data;
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }
        public function getEstrenos($user_data){
            $this->query = "SELECT * FROM obras WHERE fecha_inicio>:fecha_actual";
            $this->parametros['fecha_actual']= $user_data;
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }
        public function getObraById($user_data){
            $this->query = "SELECT * FROM obras WHERE id=:id";
            $this->parametros['id'] = $user_data;
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }
        public function votarObra($user_data){
            $this->query = "UPDATE obras SET numero_valoraciones=:numero_valoraciones WHERE id=:id";
            $this->parametros['id'] = $user_data;
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }
        public function obraVotada($user_data){
            $this->query = "UPDATE obras SET numero_valoraciones=:numero_valoraciones WHERE id=:id";
            $this->parametros['id'] = $user_data;
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }
        public function set($user_data = array()) {
            foreach ($user_data as $campo=>$valor) {
                $$campo = $valor;
            }
            $this->query = "INSERT INTO obras (titulo, descripcion, portada, fecha_inicio, fecha_final, numero_valoraciones,valoracion_media) 
            VALUES (:titulo, :descripcion, :portada, :fecha_inicio, :fecha_final, :numero_valoraciones, :valoracion_media)";
            $this->parametros['titulo'] = $user_data["titulo"];
            $this->parametros['descripcion'] = $user_data["descripcion"];
            $this->parametros['portada'] = $user_data["portada"];
            $this->parametros['fecha_inicio'] = $user_data["fecha_inicio"];
            $this->parametros['fecha_final'] = $user_data["fecha_final"];
            $this->parametros['numero_valoraciones'] = $user_data["numero_valoraciones"];
            $this->parametros['valoracion_media'] = $user_data["valoracion_media"];
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