<?php
/**
 *  Mostrar paleta de colores. 
 * Autor: Antonio Quesada Cuadrado
 */
$numhex = "";
$color = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <?php
    echo "<table>";
    echo"<h2>Paleta de colores</h2>";
    $incremento = 20;
        for($r=0; $r <= 255; $r+=$incremento) {
            for ($g=0; $g <= 255; $g+=$incremento) {
                echo "<tr>";
                for ($b=0; $b <= 255; $b+=$incremento) { 
                    $color = "rgb($r,$g,$b)";
                    $numhex = "#".dechex($r).dechex($g).dechex($b);
                    echo "<td style='background-color:$color'>$numhex</td>";
                }

                echo "</tr>";
            }
        }

    echo "</table>";
    ?>
</table>
</body>
</html>