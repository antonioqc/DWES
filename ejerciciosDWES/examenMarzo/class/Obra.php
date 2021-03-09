<!--
    Clase Obra
-->
<?php
    require_once('DBAbstractModel.php');
    

    class Obra extends DBAbstractModel{
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
        * Funcion set para agregar obras.
        */
       public function set($user_data=array()) {
            
        $this->query = "INSERT INTO obras
                        (titulo,descripcion,portada,fecha_inicio,fecha_final,numero_valoraciones,valoracion_media)
                        VALUES
                        (:titulo,:descripcion,:portada,:fecha_inicio,:fecha_final,:numero_valoraciones,:valoracion_media)";

        $this->parametros['titulo']= $user_data['titulo'];
        $this->parametros['descripcion']= $user_data['descripcion'];
        $this->parametros['portada']=$user_data['portada'];
        $this->parametros['fecha_inicio']=$user_data['fecha_inicio'];
        $this->parametros['fecha_final']=$user_data['fecha_final'];
        $this->parametros['numero_valoraciones']=$user_data['numero_valoraciones'];
        $this->parametros['valoracion_media']=$user_data['valoracion_media'];
        $this->get_results_from_query();
        $this->close_connection();
        $this->mensaje = 'Obra agregada exitosamente';
        
    }

    /**
         * Función get la cual obtendrá todo la info de una obra
         */ 
        public function getObra(){
            $this->query ="SELECT *
                    FROM obras ORDER BY fecha_final ASC";
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }
        
        /**
         * Función para obtener las obras finalizadas
         */
        public function getObrasPasadas($obra_data){
            $this->query = "SELECT * FROM obras WHERE fecha_final<:fecha_actual";
            $this->parametros['fecha_actual']= $obra_data;
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }

         /**
         * Función para obtener las obras estrenadas
         */
        public function getProximasObras($obra_data){
            $this->query = "SELECT * FROM obras WHERE fecha_inicio>:fecha_actual";
            $this->parametros['fecha_actual']= $obra_data;
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }

        public function getObraById($id){
            $this->query = "SELECT * FROM obras WHERE id = :id ";
            $this->parametros['id']=$id;
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }

        /**
         * Función para editar los valores
         */
        public function editValoracion($user_data=array()) {
            
            $this->query = " UPDATE obras
                            SET numero_valoraciones=:numero_valoraciones,
                                valoracion_media=:valoracion_media
                            WHERE
                            id = :id";
            $this->parametros['id']= $user_data['id'];
            $this->parametros['numero_valoraciones']= $user_data['numero_valoraciones'];
            $this->parametros['valoracion_media']=$user_data['valoracion_media'];
            $this->get_results_from_query();
            $this->close_connection();            
        }


    }


?>