<!--
    Clase Usuario
-->

<?php
    require_once('DBAbstractModel.php');
    

    class Usuario extends DBAbstractModel{
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
        * Funición get para saber si existe o no un usuario al crearlo en el registro.
        */
        public function get($usuario='') {
            if($usuario != '') {
                $this->query = "
                    SELECT  *
                    FROM usuarios 
                    WHERE usuario = :usuario";
                $this->parametros['usuario']= $usuario;	
                $this->get_results_from_query();
                $this->close_connection();
                $this->mensaje="No existe el usuario.";
            }
            return $this->rows;
        }


        /**
         * Funcíon para editar campo estado y directorio
         */

        public function cambiarPerfilUsuario($user_data=array()) {
            $this->query = "UPDATE usuarios
                            SET perfil=:perfil
                            WHERE
                            id = :id";
            $this->parametros['id']= $user_data['id'];
            $this->parametros['perfil']= $user_data['perfil'];
            $this->get_results_from_query();
            $this->close_connection();
        }
    }

?>