<?php
	include ("config/config.php");
    include ("funciones/funciones.php");
    include ("class/Usuarios.php");
    include ("class/Obras.php");  
    include ("class/Logs.php");
    include ("class/Tarifas.php");
    include ("class/Entradas.php");

	session_start();

	if (!isset($_SESSION["perfiles_perfil"])){
        $_SESSION["user"] = Usuarios::getInstancia();
        $_SESSION["obras"] = Obras::getInstancia();
        $_SESSION["logs"] = Logs::getInstancia();
        $_SESSION["tarifas"] = Tarifas::getInstancia();
        $_SESSION["entradas"] = Entradas::getInstancia();
        $_SESSION["perfiles_perfil"] = "invitado";
        $_SESSION["contador"] = 0;
        $_SESSION["mensaje"] = "";
    }

    if(isset($_POST["salir"])){
        cerrarSesion();
    }
    
	if (isset($_POST["login"])){
        $array = $_SESSION["user"]->get($_POST["user"]);
        $_SESSION["id_login"] = $array[0]['id'];
        $_SESSION["bloqueado"] = $array[0]['bloqueado'];

        if(sizeof($array) == 1 && $array[0]['password'] == $_POST['pass']){
            if(($_SESSION["bloqueado"])== 1){
                echo "Usuario Bloqueado tras varios intentos";
            }
                $_SESSION["id_usuario"] = $array[0]['id'];
                $_SESSION["usuario"] = $array[0]['usuario'];
                $_SESSION['perfiles_perfil'] = $array[0]['perfiles_perfil'];
                $_SESSION['email'] = $array[0]['email'];
                $_SESSION['titulo'] = $array[0]['titulo'];

                $logs_data = array('usuario'=>$array[0]['usuario'],'descripcion'=>"Login Correcto");            
                $_SESSION["logs"]->setLogs($logs_data);
                
                if (($_SESSION["perfiles_perfil"] == "gerente")) {
                    header("Location:index.php?page=gerente");
                }   
                if (($_SESSION["perfiles_perfil"] == "amigo")) {
                    header("Location:index.php?page=amigo");
                }  
             
        } else {
            if(($_SESSION["bloqueado"]) == 0){
            
                if($_SESSION["contador"]<3){
                    $_SESSION["contador"]++;
                    echo "Credenciales incorrectas. <br/>";
                    error_reporting(0);
                }else{
                    $_SESSION["user"]->bloquearUsuario($_SESSION["id_login"]);
                    echo "Usuario Bloqueado tras varios intentos";
                    $_SESSION["contador"]=0;
                    error_reporting(0);
                }
    
                $log_data = array('usuario'=>$array[0]['usuario'],
                                'descripcion'=>"Login Incorrecto.",              
                );            
        
                $_SESSION["logs"]->setLogs($log_data);
                
            }
        }

        // if ($_POST['pass'] == "" && $_POST['user'] == "") {
        //     echo "No has rellenado el usuario y la contraseña";
        // }
    } 
?>

<!DOCTYPE html>
	<head>
		<title>Examen Antonio Quesada Cuadrado</title>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="css/normalize.css">
    	<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<header>
            <?php include "include/cabecera.php"; ?>
		</header>

        <div class="contenedor">

            <div class="login">
                <?php 
                    if ($_SESSION["perfiles_perfil"] == "invitado"){ 
                        include "include/login.php";   
                    } else{
                        include "include/logout.php";
                    } 
                ?>
            </div>
            <main>
                <?php
                    if (isset($_GET["page"])){
                        if (($_GET["page"]=="index")) {
                            header("Location: index.php");
                        }
                        if (($_GET["page"]=="gerente")) {
                            include ("./page/gerente.php");
                        }
                        if (($_GET["page"]=="amigo")) {
                            include ("./page/amigo.php"); 
                        }
                    } 
                    
                    include ("./page/entradas.php"); 
                ?>
            </main>
            
        </div>
        
		<footer>
            <?php include "include/footer.php";?>         
		</footer>
</html>