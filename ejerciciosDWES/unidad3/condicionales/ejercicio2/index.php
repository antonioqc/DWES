<?php
/**
 * Cargar en variables mes y $anios e indicar el número de días del mes.
 * Autor: Antonio Quesada Cuadrado
 */
    $mes = "febrero";
    $anio = 2020;
    $img = "img/calendario.gif";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Días del mes</title>
</head>
<body>
    <?php
    if ($mes == "enero" or $mes == "marzo" or $mes == "mayo" or $mes == "julio" or $mes == "agosto" or $mes == "octubre" or $mes == "diciembre") {
        echo "<p>$mes tiene 31 días.</p>";
    } elseif ($mes == "abril" or $mes == "junio" or $mes == "septiembre" or $mes == "noviembre") {
        echo "<p>$mes tiene 29 días.</p>";
    } elseif ($mes == "febrero" and $anio%4 == 0 and $anio%100!=0 or $anio%400==0) { //si es febrero y el año es bisiesto 29 dias.
        echo "<p>$mes tiene 29 días.</p>";
    } else {
        echo "<p>$mes tiene 28 días.</p>"; //si es febrero y no es bisiesto.
    }
    echo "<p><img src= $img width= 300px></img></p>";
    ?>
</body>
</html>