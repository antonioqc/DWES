<?php
    if(!isset($_SESSION["perfiles_perfil"] ) || ($_SESSION["perfiles_perfil"] !=="amigo")){
        header("Location: index.php?page=index");
    }

    if(isset($_GET["btnVotar"])){
        $obraElegida = $_SESSION["obras"]->getObraById($_GET["btnVotar"]);
        echo "<div border=1>";
            echo "<p>Votacion de la obra ".$obraElegida[0]["titulo"]."</p>";
            echo "<form action=\"index.php?page=amigo\" method=\"post\">";
                echo "<input type=\"hidden\" name=\"id\" value=\"".$_GET["btnVotar"]."\" />";
                for($i=1; $i<6; $i++){
                    echo "<input type=\"radio\" value=\"$i\" name=\"valoracion\">$i</input><br>";
                }
                echo "<input type=\"hidden\" name=\"numVal\" value=\"".$obraElegida[0]["numero_valoraciones"]."\" />";
                echo "<input type=\"hidden\" name=\"valMed\" value=\"".$obraElegida[0]["valoracion_media"]."\" />";
                echo "<p><input type=\"submit\" name=\"btnValoracion\" value=\"Enviar valoracion\">";
            echo "</form>";
        echo "</div>";
    }
    if(isset($_POST["valoracion"])){
        if($_POST["valMed"] != 0){
            $media = ($_POST["valMed"]+$_POST["valoracion"])/($_POST["numVal"]+1);
        }else{
            $media = $_POST["valoracion"];
        };
        $arrayData = array(
            "numero_valoraciones" => $_POST["numVal"]+=1,
            "valoracion_media" => $media,
            "id" => $_POST["id"]
        );
        $_SESSION["obras"]->edit($arrayData);
        echo "Votación realizada";
    }
    echo "<h3>Listado de Obras creadas:</h3>";
    $obras = $_SESSION["obras"]->getObrasPasadas(date("Y-m-d H:i:s"));
    echo "<table border=\"1px solid black\">";
    echo "<tr><th>Titulo</th><th>Descripcion</th><th>Portada</th><th>Num valoraciones</th><th>Valoracion Media</th><th>Votar</th></tr>";
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
                case "numero_valoraciones":
                    (empty($value2)) ? $numVal = 0 : $numVal = $value2;
                    echo "<td>$value2</td>";
                    break;
                case "valoracion_media":
                    (empty($value2)) ? $valMed = 0 : $valMed = $value2;
                    echo "<td>$value2</td>";
                    break;
            }
        }
        echo "<td><a href=\"index.php?page=amigo&btnVotar=$id&numVal=$numVal&valMed=$valMed\">Votar</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    
    

?>