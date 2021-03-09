<!--
    Página gerente para el examen de Marzo
-->

<?php

    if($_SESSION["perfil"] == "invitado"){
        header("Location: index.php?page=index");
    }elseif($_SESSION["perfil"] =="amigo"){
        header("Location: index.php?page=amigo");
    }

    $lProcesarFormulario=false;
    $titulo;
    $descripcion;
    $fecha_inicio;
    $fecha_final;
    $mensajeTitulo="";
    $mensajeDescripcion="";
    $mensajeFechaInicio="";
    $mensajeFechaFinal="";


    if(isset($_POST["annadirObra"])){
        $lProcesarFormulario = true;
        $titulo = limpiarDatos($_POST["titulo"]);
        $descripcion = limpiarDatos($_POST["descripcion"]);
        $fecha_inicio = limpiarDatos(($_POST["fecha_inicio"]));
        $fecha_final = limpiarDatos(($_POST["fecha_final"]));
    }

    if(empty($_POST["titulo"])){
        $mensajeTitulo = "<font color='red'>* Introduzca un titulo. <br></font>";
        $lProcesarFormulario=false;
        $titulo="";
    }

    if(empty($_POST["descripcion"])){
        $mensajeDescripcion = "<font color='red'>* Introduzca una descripción. <br></font>";
        $lProcesarFormulario=false;
        $descripcion="";
    }

    if(empty($_POST["fecha_inicio"])){
        $mensajeFechaInicio = "<font color='red'>* Introduzca una fecha de inicio. <br></font>";
        $lProcesarFormulario=false;
        $fecha_inicio="";
    }

    if(empty($_POST["fecha_final"])){
        $mensajeFechaFinal = "<font color='red'>* Introduzca una fecha de finalización. <br></font>";
        $lProcesarFormulario=false;
        $fecha_final="";
    }

        echo "<div>";     
        if (isset($_POST["nuevaObra"])){
            if (!empty($_POST["titulo"]) && !empty($_POST["descripcion"]) && !empty($_POST["fecha_inicio"] && !empty($_POST["fecha_final"]))){
                $lProcesarFormulario = true;
            }
            echo "<b>Nueva Obra</b><br/>";
            echo "<form enctype=\"multipart/form-data\" action=\"index.php?page=gerente\" method=\"post\">";
                echo "Título: <input type=\"text\" name=\"titulo\" value=\"$titulo\">";
                if (empty($_POST["titulo"]))
                        echo $mensajeTitulo."</br>";
                    else{
                        echo "</br>";
                    }
                echo "Descripción:<br/>";
                echo "<textarea name=\"descripcion\" cols=\"40\" rows=\"5\" maxlength=\"100\"></textarea>";
                if (empty($_POST["descripcion"]))
                echo $mensajeDescripcion."</br>";
                else{
                    echo "</br>";
                }
                echo "<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"800000\">";
                echo "Portada: <input type=\"file\" name=\"portada\"><br/>";
                echo "Fecha inicio: <input type=\"text\" name=\"fecha_inicio\">";
                if (empty($_POST["fecha_inicio"]))
                echo $mensajeFechaInicio."</br>";
                else{
                    echo "</br>";
                }
                echo "Fecha final: <input type=\"text\" name=\"fecha_final\">";
                if (empty($_POST["fecha_final"]))
                echo $mensajeFechaFinal."</br>";
                else{
                    echo "</br>";
                }
                echo "<input type=\"submit\" value=\"Añadir\" name=\"annadirObra\">";
                echo "<a href=\"index.php?page=gerente\"><button>Volver</button></a>";
            echo "</form>";
        }else{
            echo "<div class=\"mostrarInfo\">";     
            echo "<form action=\"index.php?page=gerente\" method=\"post\">";
                echo "<br/><br/>";
                echo "<input type=\"submit\" value=\"Nueva Obra\" name=\"nuevaObra\">";
        echo "</form>";

       //Mostrar ficheros de log
       echo "<br/><br/>Lista de logs<br/>";
        $mostrarLista = $_SESSION["logs"]->getLog();
       echo "<table>";
       echo "<tr><th>Fecha-Hora</th><th>Usuario</th><th>Descripción</th></tr>";
       foreach ($mostrarLista as $value){
           echo "<tr>";
               echo "<td>"; 
                   echo $value['fecha_hora'];
               echo "</td>";
               echo "<td>"; 
                   echo $value['usuario'];
               echo "</td>";
               echo "<td>"; 
                   echo $value['descripcion'];
               echo "</td>";    
           echo "</tr>";
        }    
        echo "</table>";  
        }

    echo "</div>";


    //Añadir Obra

    if($lProcesarFormulario == true){
        $portada = "img".date("HmsdmY").".jpg";
        
        move_uploaded_file($_FILES['portada']['tmp_name'],"./img/".$portada);
    
        $array_datos = array(
            'titulo'=>$_POST["titulo"],
            'descripcion'=>$_POST["descripcion"],
            'portada'=>$portada,
            'fecha_inicio'=>$_POST["fecha_inicio"],
            'fecha_final'=>$_POST["fecha_final"],
            'numero_valoraciones'=>0,
            'valoracion_media'=>0
        );
    
        $_SESSION["obra"]->set($array_datos);
    }
    
?>     