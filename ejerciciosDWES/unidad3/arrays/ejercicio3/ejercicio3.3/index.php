<?php
/**
 * Define un array que permita almacenar y mostrar la siguiente información:
 * Nota de los alumnos de 2º DAW para el módulo DWES.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 3.3</title>
</head>
<body>
    <?php
    $notas = array(
        array("nombre"=>"Antonio Quesada Cuadrado", "nota"=>10),  
        array("nombre"=>"Ana Pérez Sánchez", "nota"=>10),  
        array("nombre"=>"Jose Jiménez Fernández", "nota"=>10),  
        array("nombre"=>"Juan Cuadrado Cuadrado", "nota"=>10),  
        array("nombre"=>"Pedro Díaz Díaz", "nota"=>10),  
    );  
        echo "<h2>Notas alumnos:</h2>";
        foreach($notas as $valornotas){
            echo "<p>La nota de ".$valornotas["nombre"]." y su nota es un ".$valornotas["nota"]."</p>";
        }
    ?>
</body>
</html>