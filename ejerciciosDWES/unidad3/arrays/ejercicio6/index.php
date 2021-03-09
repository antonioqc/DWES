<?php

/**
 * Dado un array de 20 elementos que consiste en números reales (con coma decimal) y que cada elemento representa la venta
 * del día de un comercio. Calcular el promedio de venta por día utilizando alguna estructura iterativa. Mostrar el resultado por pantalla.
 */

$suma = 0;
$media = 0;

$numeros = array(
    100,23, 200,12, 300,20, 400,34, 500,67, 600,78, 700,87, 800,59, 900,05, 1000,21,
    1100,27, 1200,55, 1300,66, 1400,33, 1500,22, 1600,11, 1700,10, 1800,16, 1900,07, 2000,39
);


foreach ($numeros as $valornumeros) {
    $suma += $valornumeros;
}

$media = $suma / count($numeros);

echo ("La media de la venta de un día de un comercio es "  . $media);
?>

