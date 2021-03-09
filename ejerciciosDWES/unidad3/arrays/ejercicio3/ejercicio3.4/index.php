<?php
/**
 * Define un array que permita almacenar y mostrar la siguiente información.
 * Verbos irregulares en inglés.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 3.4</title>
</head>
<body>
    <?php
        $verbosirregulares = array(
            array("infinitivo"=>"bear","pasado"=>"bore","participio"=>"borne"),
            array("infinitivo"=>"beat","pasado"=>"beat","participio"=>"beaten"),
            array("infinitivo"=>"become","pasado"=>"became","participio"=>"become"),
            array("infinitivo"=>"begin","pasado"=>"began","participio"=>"begun"),
            array("infinitivo"=>"bend","pasado"=>"bent","participio"=>"bent"),
            array("infinitivo"=>"bet","pasado"=>"bet","participio"=>"bet"),
            array("infinitivo"=>"bring","pasado"=>"brought","participio"=>"brought"),
            array("infinitivo"=>"buy","pasado"=>"bought","participio"=>"bought"),
            array("infinitivo"=>"cast","pasado"=>"cast","participio"=>"cast"),            
            array("infinitivo"=>"catch","pasado"=>"caught","participio"=>"caught"),            
            array("infinitivo"=>"eat","pasado"=>"ate","participio"=>"eaten"), 
            array("infinitivo"=>"forget","pasado"=>"forgot","participio"=>"forgotten"), 
            array("infinitivo"=>"get","pasado"=>"got","participio"=>"got"), 
        );

        echo "<h2>Listado verbos irregulares</h2>";
        echo "<table border = '1'>";
        echo "<tr>";
        echo "<td><b>Infinitivo</b></td><td><b>Pasado</b></td><td><b>Participio</b></td>";
        foreach($verbosirregulares as $valor){
            echo "<tr>";
            echo "<td>";
            echo $valor["infinitivo"];
            echo "</td>";
            echo "<td>";
            echo $valor["pasado"];
            echo "</td>";
            echo "<td>";
            echo $valor["participio"];
            echo "</td>";
            echo "</tr>";
        }
        echo "</tr>";
        echo "</table>";
    ?>
</body>
</html>