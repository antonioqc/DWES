<!--
    Página usuario del ejercicio Secretaria
-->

<?php

    if(!isset($_SESSION["perfil"] ) || ($_SESSION["perfil"] !=="premium") && ($_SESSION["perfil"] !=="basico") ){
        header("Location: ./index.php");
    }

    echo "<div class='mostrarInfo'>";

    if($_SESSION['perfil']=="basico"){
        $mostrarLista = $_SESSION["serie"]->getSerie();

        echo "<br/><br/>Listado de Series";
        echo "<table>";
        echo "<tr><th>Título</th><th>Carátula</th><th>Reproducir Serie</th></th><th>Número Reproducciones</th></tr>";
        foreach ($mostrarLista as $value){
            echo "<tr>";
                echo "<td>"; 
                    echo $value['titulo'];
                echo "</td>";
                echo "<td>";
                    echo "<img src=./img/".$value["caratula"]." alt='Imagen de la serie' width='250' height='250'>";
                echo "</td>";
                echo ( $value['id_plan'] == "2" ? "<td><a href='"."index.php?page=registrado&hazPremium=".$value["id"]."'><button>Hazte Premium</button></a></td>" : 
                "<td><a href='"."index.php?page=registrado&visualizar=".$value["id"]."'><button>Reproducir Serie</button></a></td>");
                echo "<td>"; 
                    echo $value['numero_reproducciones'];
                echo "</td>";
            echo "</tr>";
        }    
        echo "</table>";
    }elseif ($_SESSION['perfil']=="premium") {
        $mostrarLista = $_SESSION["serie"]->getSerie();
        echo "<br/><br/>Listado de Series";
        echo "<table>";
        echo "<tr><th>Título</th><th>Carátula</th><th>Reproducir Serie</th></th><th>Número Reproducciones</th></tr>";
        foreach ($mostrarLista as $value){
            echo "<tr>";
                echo "<td>"; 
                    echo $value['titulo'];
                echo "</td>";
                echo "<td>";
                    echo "<img src=./img/".$value["caratula"]." alt='Imagen de la serie' width='250' height='250'>";
                echo "</td>";
                echo "<td><a href='"."index.php?page=registrado&visualizar=".$value["id"]."'><button>Reproducir Serie</button></a></td>";
                echo "<td>"; 
                    echo $value['numero_reproducciones'];
                echo "</td>";
            echo "</tr>";
        }    
        echo "</table>";
    }
    echo "</div>";


    if(isset($_GET['visualizar'])){
       
        $numeroReproducciones = ($_SESSION['serie']->getNumeroReproducciones($_GET['visualizar'])[0]['numero_reproducciones']);
        
        $serie_data = array(
            'id'=> $_GET['visualizar'],
            'numero_reproducciones'=> $numeroReproducciones+1
        ); 
        $_SESSION["serie"]->visualizarSerie($serie_data); 
        header("Location: index.php?page=registrado");
    }

    if(isset($_GET['hazPremium'])){
    
        $user_data = array(
            'id'=> $_SESSION["id_usuario"],
            'perfil'=> "premium"
        ); 

        $_SESSION["user"]->cambiarPerfilUsuario($user_data); 
        header("Location: index.php?page=registrado");
    } 
?>


