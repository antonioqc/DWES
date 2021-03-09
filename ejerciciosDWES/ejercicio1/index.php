<?php
   include "config/config.php";
   include "class/Usuario.php";
   include "class/Log.php";
   include "class/Obra.php";
   include "class/Entrada.php";
   
   session_start();
   
    if(!isset($_SESSION["perfil"])){
        $_SESSION["usuario"] = Usuario::getInstancia();
        $_SESSION["obra"] = Obra::getInstancia();
        $_SESSION["log"] = Log::getInstancia();
        $_SESSION["entrada"] = Entrada::getInstancia();
        $_SESSION["perfil"]="invitado";
        $_SESSION["user"]="invitado";
        $_SESSION["intentos"] = 0;
    }
    $_SESSION["filas"] = 21;
    $_SESSION["columnas"] = 11;
    if(isset($_POST["iniciarSesion"])){
        $arrayUsuario = $_SESSION["usuario"]->get($_POST["user"]);
        $_SESSION["bloqueado"] = $arrayUsuario[0]["bloqueado"];
        if(sizeof($arrayUsuario) == 1 && $arrayUsuario[0]["password"] == $_POST["pass"]){
            if($_SESSION["bloqueado"] == 1){
                echo "Usuario bloqueado";
                header("Location: index.php?page=home");
            }else{
                $_SESSION["id_usuario"] = $arrayUsuario[0]["id"];
                $_SESSION["user"] = $arrayUsuario[0]["usuario"];
                $_SESSION["perfil"] = $arrayUsuario[0]["perfiles_perfil"];
                $_SESSION["email"] = $arrayUsuario[0]["email"];
                if ($_SESSION["perfil"] == "gerente") {
                    header("Location: index.php?page=gerente");
                }else{
                    header("Location: index.php?page=amigo");
                }
            }
        }else{
            if($_SESSION["bloqueado"] == 0){
                if($_SESSION["intentos"] < 3){
                    $_SESSION["intentos"]+= 1;
                    echo "ERROR, has fallado". $_SESSION["intentos"]." intento/s, a los 3 intentos se bloqueara tu usuario";
                }else{
                    $_SESSION["usuario"]->bloquearUser($_POST["user"]);
                    $_SESSION["intentos"] = 0;
                    echo "USUARIO ".$_POST["user"]." BLOQUEADO";
                    $fecha = new DateTime();
                    $arrayData = array(
                        "fecha_hora" => $fecha->format('Y-m-d H:i:s'),
                        "usuario" => $_SESSION["user"],
                        "descripcion" => "Intento fallido de inicio de sesion"
                    );
                    $_SESSION["log"]->set($arrayData);
                }
            }
        }
    }
    if(isset($_POST["cerrarSesion"])){
        include "include/logout.php";
    }
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Autentificación</title>
</head>
<body>
    <?php include "include/header.php"; ?>
    <?php
    if($_SESSION["perfil"] == "invitado"){
        include "include/login.php";
    }else{
        echo "<form action='index.php' method='post'>";
            echo "<input type='submit' name='cerrarSesion' value='Cerrar Sesión'>";
        echo "</form>";
    }
    ?>
    <main>
        <?php
        //Mostrar estrenos con opcion a compra
        echo "<h2>Estrenos</h2>";
        $obras = $_SESSION["obra"]->getEstrenos(date("Y-m-d H:i:s"));
        echo "<table border=\"1px solid black\">";
            echo "<tr><th>Titulo</th><th>Descripcion</th><th>Portada</th><th>Entradas</th></tr>";
            foreach($obras as $key => $value){
                echo "<tr>";
                foreach($value as $key2 => $value2){
                    switch($key2){
                        case "id";
                            $id = $value2;
                            break;
                        case "titulo";
                            echo "<td>$value2</td>";
                            break;
                        case "portada":
                            echo "<td><img src=\"imagenes/$value2\" width=\"50px\" /></td>";
                                break;
                        case "descripcion":
                            echo "<td>$value2</td>";
                            break;
                        }
                    }
                    echo "<td><a href=\"index.php?btnEntradas=$id\">Entradas</a></td>";
                echo "</tr>";
            }  
        echo "</table>";

        if($_SESSION["perfil"]!= "invitado"){
            $entradasUser = $_SESSION["entrada"]->getEntradasByEmail($_SESSION["email"]);
            if(!empty($entradasUser)){
                echo "<h2>Entradas compradas por ti</h2>";
    
                foreach($entradasUser as $key => $value){
                    echo "Entrada ".$value["id"]." precio= ".$value["precio"].", fila ".$value["fila"].", columna ".$value["columna"]."<br>";
                }
            }
        }
        if(isset($_GET["btnEntradas"])){
            echo "<h2>Entradas para ".$_SESSION["obra"]->getObraById($_GET["btnEntradas"])[0]["titulo"]."</h2>";
            $entradasCompradas = $_SESSION["entrada"]->getEntradas($_GET["btnEntradas"]);
            $precioEntradas = $_SESSION["entrada"]->getTarifa($_GET["btnEntradas"]);

            //Creacion de butacas
            $_SESSION["arrayButacas"] = array();
            for($i=0; $i<$_SESSION["filas"]; $i++){
                array_push($_SESSION["arrayButacas"], array());
                for($j=0; $j<$_SESSION["columnas"]; $j++){
                    if($i<6){
                        array_push($_SESSION["arrayButacas"][$i], $precioEntradas[0]["zonaA"]);
                    }elseif ($i>5 && $i<11) {
                        array_push($_SESSION["arrayButacas"][$i], $precioEntradas[0]["zonaB"]);
                    }else{
                        array_push($_SESSION["arrayButacas"][$i], $precioEntradas[0]["zonaC"]);
                    }
                }
            }
            if(empty($entradasCompradas)){
                $mostrarButacas = $_SESSION["arrayButacas"];
            }else{
                echo "Ya hay alguna entrada compradas";
                $butacasOcupadas = array();
                foreach($entradasCompradas as $key => $value){
                    foreach($value as $key2 => $value2){
                        if($key2 == "fila"){
                           $fila = $value2;
                        }elseif ($key2 == "columna") {
                            $columna = $value2;
                        }
                        // $butaca = array($fila, $columna);
                        // array_push($butaca, $butacasOcupadas);
                    }
                }
                // print_r($butacasOcupadas);
                $mostrarButacas = $_SESSION["arrayButacas"];
                print_r($mostrarButacas);
            }
            echo "<form action=\"index.php\" method=\"post\">";
                echo "<table border=\"1px solid black\">";
                    foreach($_SESSION["arrayButacas"] as $key => $value){
                        echo "<tr>";
                        foreach($value as $key2 => $value2){
                            echo "<td><input type=\"checkbox\" name=\"entradaSelec[]\" value=\"$key,$key2\">$value2</input></td>";
                        }
                        echo "</tr>";
                    }
                echo "</table>";
                echo "<input type=\"hidden\" name=\"idObra\" value=\"".$_GET["btnEntradas"]."\"/>";
                echo "<p><input type=\"submit\" name=\"btnComprar\" value=\"Boton Comprar\" /></p>";
            echo "</form>";
        }
        //Boton final para efectuar la compra
        if(isset($_POST["btnComprar"])){
            if($_SESSION["perfil"] != "invitado"){
                $importeTotal = 0;
                foreach($_POST["entradaSelec"] as $key => $value){
                    $valores = explode(",", $value);
                    $precio = $_SESSION["arrayButacas"][$valores[0]][$valores[1]];
                    $importeTotal+= $precio;
                    $arrayData = array(
                        "idObra" => $_POST["idObra"],
                        "fila" => $valores[1],
                        "columna" => $valores[0],
                        "precio" => $precio,
                        "email" => $_SESSION["email"]
                    );
                    $_SESSION["entrada"]->set($arrayData);
                }
                echo "Has comprado entradas para la obra<br>";
                echo "El importe total ha sido: ".$importeTotal;
            }
        }


        if (isset($_GET["page"])){
            if ($_GET["page"]=="index") {
                header("Location: index.php");
            }else if ($_GET["page"]=="gerente") {
                include ("pages/gerente.php");   
            }else if (($_GET["page"]=="amigo")) {
                include ("pages/amigo.php"); 
            }
            else if (($_GET["page"]=="home")) {
                include ("pages/home.php"); 
            }
        }
        
        ?>
    </main>
</body>
<footer><?php include "include/footer.php" ?></footer>
</html>