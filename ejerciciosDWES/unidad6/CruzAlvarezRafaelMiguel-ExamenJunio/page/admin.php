<!--
    Página admin del ejercicio Secretaria
-->

<?php

    if(!isset($_SESSION["perfil"] ) || ($_SESSION["perfil"] !=="admin")){
        header("Location: index.php?page=index");
    }

    echo "<form action='index.php?page=admin' method=\"post\">";
        echo "<br/><br/>";
        echo "<input type='submit' value='Nueva Encuesta' name='nuevaEncuesta'>";
    echo "</form>";



    if(isset($_POST['nuevaEncuesta'])){
        echo "<p><b>Registro de nueva Encuesta</b></p>";
            
        echo "<form action='index.php?page=admin' method='post'><br/>";
            echo "Titulo <input type='text' name='titulo'><br/>";
            echo "Fecha Inicio <input type='date' name='horaInicio'><br/>";
            echo "Fecha Final <input type='date' name='horaFinal'><br/>";
         /*    echo "Pregunta 1 <input type='text' name='pre1'><br/>";
            echo "Pregunta 2 <input type='text' name='pre2'><br/>";
            echo "Pregunta 3 <input type='text' name='pre3'><br/>";
            echo "Pregunta 4 <input type='text' name='pre4'><br/>";
            echo "Pregunta 5 <input type='text' name='pre5'><br/>"; */
            echo "<input type='submit' name='annadir' value='Añadir'>";
            echo "<br/>";
        echo "</form>";
    }else{
        echo "<p>Listado de encuestas creadas.</p>";

        $mostrarLista = $_SESSION["encuesta"]->getEncuesta();
        echo "<table>";
        echo "<tr><th>Título</th><th>Fecha Inicio</th><th>Fecha Final</th></tr>";
        foreach ($mostrarLista as $value){
            echo "<tr>";
                echo "<td>"; 
                    echo $value['Titulo'];
                echo "</td>";
                echo "<td>"; 
                    echo $value['fechaHoraInicio'];
                echo "</td>";
                echo "<td>"; 
                    echo $value['fechaHoraFinal'];
                echo "</td>";
                echo  "<td><a href='"."index.php?page=admin&mostrarEncuesta=".$value["id"]."'><button>Mostrar Encuesta</button></a></td>";
            echo "</tr>";
        }    
        echo "</table>";
    }

    if (isset($_GET['mostrarEncuesta'])){
        $mostrarPreguntas=$_SESSION['encuesta']->getPreguntasEncuesta($_GET["mostrarEncuesta"]);

        echo "<tr><th>Preguntas</th></tr>";
        foreach ($mostrarPreguntas as $value){
            echo "<tr>";
                echo "<td>"; 
                    echo "<p>".$value['pregunta']."</p>";
                echo "</td>";
            echo "</tr>";
        }    
        echo "</table>";

    }

    if(isset($_POST["annadir"])){
    
        $array_datos = array(
            'Titulo'=>$_POST["titulo"],
            'fechaHoraInicio'=>$_POST["horaInicio"],
            'fechaHoraFinal'=>$_POST["horaFinal"]
        );

        $_SESSION["encuesta"]->annadirEncuesta($array_datos); 
    } 


    echo "</div>";
?>     