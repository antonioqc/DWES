<!--
    Página usuario del ejercicio Secretaria
-->

<?php

    if($_SESSION["perfil"] == "invitado"){
        header("Location: index.php?page=index");
    }elseif($_SESSION["perfil"] =="gerente"){
        header("Location: index.php?page=gerente");
    }
    
    echo "<p><b>Listado de Obras</b></p>";
        $mostrarLista = $_SESSION["obra"]->getObrasPasadas(date("Y-m-d H:i:s"));
       echo "<table>";
       echo "<tr><th>Titulo</th><th>Descripción</th><th>Portada</th><th>Fecha Inicio</th><th>Fecha Final</th><th>Puntuación Media</th><th>Votar</th></tr>";
       foreach ($mostrarLista as $value){
           echo "<tr>";
               echo "<td>"; 
                   echo $value['titulo'];
               echo "</td>";
               echo "<td>"; 
                   echo $value['descripcion'];
               echo "</td>";
               echo "<td>"; 
                    echo "<img src=./img/".$value["portada"]." alt='Imagen de la obra' width='70' height='70'>";
               echo "</td>";   
               echo "<td>"; 
                   echo $value['fecha_inicio'];
               echo "</td>"; 
               echo "<td>"; 
                   echo $value['fecha_final'];
               echo "</td>";
               echo "<td>"; 
                   echo $value['valoracion_media'];
               echo "</td>";
               echo "<td>";
                    echo "<form action=\"index.php?page=amigo\" method=\"post\">";
                        echo "<input type=\"hidden\" name=\"id\" value='".$value['id']."' />";
                        echo "<input type=\"radio\" name=\"valor\" value=\"1\">1";
                        echo "<input type=\"radio\" name=\"valor\" value=\"2\">2";
                        echo "<input type=\"radio\" name=\"valor\" value=\"3\">3";
                        echo "<input type=\"radio\" name=\"valor\" value=\"4\">4";
                        echo "<input type=\"radio\" name=\"valor\" value=\"5\">5<br/>";

                        echo "<input type=\"hidden\" name=\"total_valoraciones\" value='".$value['numero_valoraciones']."' />";
                        echo "<input type=\"hidden\" name=\"media\" value='".$value['valoracion_media']."' />";
                        echo "<input type=\"submit\" value=\"Realizar Votación\" name=\"votacion\">";
                    echo "</form>";
               echo"</td>";
           echo "</tr>";
        }    
        echo "</table>";  
        
        if(isset($_POST["votacion"])){
            if($_POST["media"] != 0){
                $media = ($_POST["media"]+$_POST["valor"])/($_POST["total_valoraciones"]+1);
            }else{
                 $media = $_POST["valor"];
            };
            $datos_puntuacion = array(
                "numero_valoraciones" => $_POST["total_valoraciones"]+=1,
                "valoracion_media" => $media,
                "id" => $_POST["id"]
            );
            $_SESSION["obra"]->editValoracion($datos_puntuacion);
            header("Location: index.php?page=amigo");
        }
        

?>