<!--
    Clase Usuario
-->

<?php
    require_once('class/DBAbstractModel.php');

    class Obras extends DBAbstractModel{
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
          * Añadir nueva obra
          */

        public function annadirObra($obra_data=array()) {
    
            $this->query = "INSERT INTO obras (titulo, descripcion, portada, fecha_inicio, fecha_final) VALUES (:titulo, :descripcion, :portada, :fechainicio, :fechafinal)";
            $this->parametros['titulo']= $obra_data['titulo'];
            $this->parametros['descripcion']= $obra_data['descripcion'];
            $this->parametros['portada']= $obra_data['portada'];
            $this->parametros['fechainicio']=$obra_data['fechainicio'];
            $this->parametros['fechafinal']=$obra_data['fechafinal'];
            $this->get_results_from_query();
            $this->close_connection();            
        }


        /**
        * Obras actuales
        */
        public function getObrasActuales(){
            $this->query = "SELECT * FROM obras where fecha_inicio BETWEEN 2020-03-01 AND CURDATE()";
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }


        /**
        * Obras actuales
        */
        public function getObrasTitulo(){
            $this->query = "SELECT O.titulo from obras o join tarifas t on o.idObra=t.id";
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

        public function getObrasPasadas($user_data){
            $this->query = "SELECT * FROM obras WHERE fecha_final<:fecha_actual";
            $this->parametros['fecha_actual']= $user_data;
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
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

        public function getEstrenos($user_data){
            $this->query = "SELECT * FROM obras WHERE fecha_inicio>:fecha_actual";
            $this->parametros['fecha_actual']= $user_data;
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }


    }

?>