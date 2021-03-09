<?php
/**
 * 3.- Tablas de multiplicar 1 al 10
 * Autor: Antonio Quesada Cuadrado
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
<table border="2" align="center">
    <?php
    //Números de arriba de la tabla
    for ($narribatabla=0;$narribatabla<=10; $narribatabla++){
        echo "<th>";
        echo $narribatabla;
        echo "</th>";
    }

    //Números lado izquierdo de la tabla
    for ($nizquierdatabla=1; $nizquierdatabla<=10; $nizquierdatabla++){
        echo "<tr>";
        echo "<th>";
        echo $nizquierdatabla;
        echo "</th>";

        //Contenido de la tabla, multiplicación
            for ($i=1;$i<=10;$i++){                      
                $resultado=$nizquierdatabla*$i;                    
                echo "<td>";                      
                echo $resultado;                      
                echo "</td>";              
            }              
        echo "</tr>";          
    }      
    ?>      
</table>
</body>
</html>
