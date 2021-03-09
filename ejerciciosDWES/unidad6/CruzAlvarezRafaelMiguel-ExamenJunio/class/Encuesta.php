<!--
    Clase Encuesta
-->

<?php
    require_once('DBAbstractModel.php');
    

    class Encuesta extends DBAbstractModel{
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
         * Obtener encuestas
         */
         public function getEncuesta(){
                $this->query = "SELECT * FROM encuestas";
                $this->get_results_from_query();
                $this->close_connection();
                return $this->rows;
         }

         /**
          * Añadir nueva encuesta
          */

        public function annadirEncuesta($encuesta_data=array()) {
    
            $this->query = "INSERT INTO encuestas
                            (Titulo, fechaHoraInicio,fechaHoraFinal)
                            VALUES
                            (:Titulo, :fechaHoraInicio,:fechaHoraFinal)";
            $this->parametros['Titulo']= $encuesta_data['Titulo'];
            $this->parametros['fechaHoraInicio']=date("Y-m-d");
            $this->parametros['fechaHoraFinal']=date("Y-m-d");
            $this->get_results_from_query();
            $this->close_connection();            
        }

        /**
          * Añadir pregunta a encuesta
          */

          /* public function annadirPreguntas($preguntas_data=array()) {
    
            $this->query = "INSERT INTO encuestas_preguntas
                            (pregunta)
                            VALUES
                            (:pregunta)";
            $this->parametros['pregunta']= $preguntas_data['pregunta'];
            $this->get_results_from_query();
            $this->close_connection();            
        } */
            

          /**
           * Mostrar preguntas encuesta
           */

            public function getPreguntasEncuesta($id){
                $this->query = "SELECT EP.pregunta FROM encuestas_preguntas EP, encuestas E 
                                WHERE EP.idEncuesta = E.id";
                $this->parametros['id'] = $id;
                $this->get_results_from_query();
                $this->close_connection();
                return $this->rows;
            }


            

    }

?>