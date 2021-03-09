<?php
$_SESSION["filas"] = 21;
$_SESSION["columnas"] = 11;
echo "<h3>Obras recientes</h3>";
$obras = $_SESSION["obras"]->getEstrenos(date("Y-m-d H:i:s"));
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
                    echo "<td><img src=\"img/$value2\" width=\"50px\" /></td>";
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

if($_SESSION["perfiles_perfil"]!= "invitado"){
    $entradasUser = $_SESSION["entradas"]->getEntradasByEmail($_SESSION["email"]);
    if(!empty($entradasUser)){
        echo "<h3>Tus entradas</h3>";
        echo "<table border=1>";
        echo "<tr><th>Entrada</th><th>Precio</th><th>Fila</th><th>Columna</th></tr>";
        foreach ($entradasUser as $key => $value){
            echo "<tr>";
                echo "<td>"; 
                    echo $value['id'];
                echo "</td>";
                echo "<td>"; 
                    echo $value['precio'];
                echo "</td>";
                echo "<td>"; 
                    echo $value['fila'];
                echo "</td>";
                echo "<td>"; 
                    echo $value['columna'];
                echo "</td>";
            echo "</tr>";
        }    
        echo "</table>";
    }
}
if(isset($_GET["btnEntradas"])){
    echo "<h2>Entradas para ".$_SESSION["obras"]->getObraById($_GET["btnEntradas"])[0]["titulo"]."</h2>";
    $entradasCompradas = $_SESSION["entradas"]->getEntradas($_GET["btnEntradas"]);
    $precioEntradas = $_SESSION["entradas"]->getTarifa($_GET["btnEntradas"]);

    $_SESSION["aButacas"] = array();
    for($i=0; $i<$_SESSION["filas"]; $i++){
        array_push($_SESSION["aButacas"], array());
        for($j=0; $j<$_SESSION["columnas"]; $j++){
            if($i<6){
                array_push($_SESSION["aButacas"][$i], $precioEntradas[0]["zonaA"]);
            }elseif ($i>5 && $i<11) {
                array_push($_SESSION["aButacas"][$i], $precioEntradas[0]["zonaB"]);
            }else{
                array_push($_SESSION["aButacas"][$i], $precioEntradas[0]["zonaC"]);
            }
        }
    }
    if(empty($entradasCompradas)){
        $mostrarButacas = $_SESSION["aButacas"];
    }else{
        echo "Entradas ocupadas";
        $butacasOcupadas = array();
        foreach($entradasCompradas as $key => $value){
            foreach($value as $key2 => $value2){
                if($key2 == "fila"){
                   $fila = $value2;
                }elseif ($key2 == "columna") {
                    $columna = $value2;
                }
            }
        }
        $mostrarButacas = $_SESSION["aButacas"];
    }
    echo "<form action=\"index.php\" method=\"post\">";
        echo "<table border=\"1px solid black\">";
            foreach($_SESSION["aButacas"] as $key => $value){
                echo "<tr>";
                foreach($value as $key2 => $value2){
                    echo "<td><input type=\"checkbox\" name=\"entradaSelec[]\" value=\"$key,$key2\">$value2</input></td>";
                }
                echo "</tr>";
            }
        echo "</table>";
        echo "<input type=\"hidden\" name=\"idObra\" value=\"".$_GET["btnEntradas"]."\"/>";
        echo "<p><input type=\"submit\" name=\"btnComprar\" value=\"Comprar Entradas\" /></p>";
    echo "</form>";
}

if(isset($_POST["btnComprar"])){
    if($_SESSION["perfiles_perfil"] != "invitado"){
        $importeTotal = 0;
        foreach($_POST["entradaSelec"] as $key => $value){
            $valores = explode(",", $value);
            $precio = $_SESSION["aButacas"][$valores[0]][$valores[1]];
            $importeTotal+= $precio;
            $arrayData = array(
                "idObra" => $_POST["idObra"],
                "fila" => $valores[1],
                "columna" => $valores[0],
                "precio" => $precio,
                "email" => $_SESSION["email"]
            );
            $_SESSION["entradas"]->set($arrayData);
        }
        echo "Entradas compradas:<br>";
        echo "Importe: ".$importeTotal;
    }
}

?>
