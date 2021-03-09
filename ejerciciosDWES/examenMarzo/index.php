<?php
	include ("./config/parameters.php");
    include ("./config/config_dev.php");
    include ("./funciones/funciones.php");
    include ("./class/Usuario.php");
    include ("./class/Log.php");
    include ("./class/Obra.php");
    include ("./class/Entrada.php");

	session_start();

	if (!isset($_SESSION["perfil"])){
        $_SESSION["user"] = Usuario::getInstancia();
        $_SESSION["logs"] = Log::getInstancia();
        $_SESSION["obra"] = Obra::getInstancia();
        $_SESSION["entrada"]= Entrada::getInstancia();
        $_SESSION["perfil"] = "invitado";
        $_SESSION["contador"] = 0;
        $_SESSION["mapa"] = array();
        $_SESSION["numEntradas"]=array();
    }

    if(isset($_POST["salir"])){
        cerrarSesion();
    }
    
	if (isset($_POST["login"])){
        $array = $_SESSION["user"]->get($_POST["user"]);
        $_SESSION["id_login"] = $array[0]['id'];
        $_SESSION["block"] = $array[0]['bloqueado'];

        if(sizeof($array) == 1 && $array[0]['password'] == $_POST['pass']){

            if(($_SESSION["block"])== 1){
                echo "Usuario Bloqueado tras varios intentos";
            }

            $_SESSION["id_usuario"] = $array[0]['id'];
            $_SESSION["usuario"] = $array[0]['usuario'];
            $_SESSION['perfil'] = $array[0]['perfiles_perfil'];

            $log_data = array('usuario'=>$array[0]['usuario'],
                            'descripcion'=>"Login Correcto.",              
            );            

            $_SESSION["logs"]->set($log_data);

            if ($_SESSION["perfil"] == "gerente") {
                header("Location:index.php?page=gerente");
            }   
            if ($_SESSION["perfil"] == "amigo") {
                header("Location:index.php?page=amigo");
            }     
        }else{
            if(($_SESSION["block"]) == 0){
            
                if($_SESSION["contador"]<3){
    
                    $_SESSION["contador"]++;
                    echo "Usuario o Contraseña incorrecta. <br/>";
                }else{
                    $_SESSION["user"]->bloquearUsuario($_SESSION["id_login"]);
                    echo "Usuario Bloqueado tras varios intentos";
                    $_SESSION["contador"]=0;
                }
    
                $log_data = array('usuario'=>$array[0]['usuario'],
                                'descripcion'=>"Login Incorrecto.",              
                );            
        
                $_SESSION["logs"]->set($log_data);
                
            }
        }
    }
?>

<!DOCTYPE html>
	<head>
		<title><?php echo $TITULO ?></title>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    	<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<header>
            <?php include "include/cabecera.php"; ?>
		</header>

        <div class="contenedor">

            <div class="login">
                <?php 
                   

                    if ($_SESSION["perfil"] == "invitado"){ 
                        include "include/login.php";
                    }else{
                        include "include/logout.php";
                        if ($_SESSION["perfil"]=="amigo")
                            include "include/comprarEntradas.php";
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
                        if (($_GET["page"]=="entrada")) {
                            include ("./page/entrada.php"); 
                        }
                    }else{
                        include ("./page/home.php");
                    }
                ?>
              </main>
        </div>
        
		<footer>
            <?php include "include/footer.php";?>         
		</footer>
</html>