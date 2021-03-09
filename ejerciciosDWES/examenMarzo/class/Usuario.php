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
        * Funición get para obtenes un usuario de la base de datos.
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

        /**Función para bloquear usuario tras varios intentos 
        * 
        */
        public function bloquearUsuario($id){
            $this->query = " UPDATE usuarios
                                 SET bloqueado = :bloqueado
                                 WHERE id = :id
                ";
                $this->parametros['bloqueado']=1;
                $this->parametros['id']=$id;
                $this->get_results_from_query();
                $this->close_connection();
                $this->mensaje = "Usuario bloqueado.";
        } 

    }

?>