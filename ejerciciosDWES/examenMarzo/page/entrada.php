<?php

if (isset($_GET["comprar"])){
    $mostrarLista = $_SESSION["obra"]->getObraById($_GET["comprar"]);
    $id = $_GET["comprar"];
    echo "<h2>Comprar entrada</h2><br/>";
    foreach ($mostrarLista as $value){
        echo "<Titulo Obra : ><b>".$value['titulo']."</b>";
    }
    
    crearMapa();
    mostrarMapa();

    echo "<form action='index.php?page=entrada&comprar=$id' method='post'><br/>";
        echo "<input type=\"submit\" value=\"Comprar\" name=\"comprarEntrada\">";
        echo "<a href='index.php'><input type='button' value='Atrás'></a>";
    echo "</form>";
}

if (isset($_POST["comprarEntrada"])){
    if(($_SESSION["perfil"])=="invitado"){
        echo "Debe hacer login para comprar la entrada.";
    }
    else{
        echo "Puede proceder al pago de las entradas";
    }

}


?>