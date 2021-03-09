<?php

echo "<h3>Listado de Obras creadas:</h3>";

$listaObras = $_SESSION["obras"]->getObrasActuales();
echo "<table border=1>";
echo "<tr><th>Título</th><th>Descripcion</th><th>Portada</th><th>Fecha Inicio</th><th>Fecha Final</th><th>Número Valoraciones</th><th>Valoración Media</th><th>Entradas</th></tr>";
foreach ($listaObras as $value){
    echo "<tr>";
        echo "<td>"; 
            echo $value['titulo'];
        echo "</td>";
        echo "<td>"; 
            echo $value['descripcion'];
        echo "</td>";
        echo "<td>"; 
            echo "<img src=./img/".$value["portada"]." width=100>";
        echo "</td>";
        echo "<td>"; 
            echo $value['fecha_inicio'];
        echo "</td>";
        echo "<td>"; 
            echo $value['fecha_final'];
        echo "</td>";
        echo "<td>"; 
            echo $value['numero_valoraciones'];
        echo "</td>";
        echo "<td>"; 
            echo $value['valoracion_media'];
        echo "</td>";
        echo  "<td><a href='"."index.php?page=entradas'><button>Entradas</button></a></td>";
    echo "</tr>";
}    
echo "</table>";
?>
