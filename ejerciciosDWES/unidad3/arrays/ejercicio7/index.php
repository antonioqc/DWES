<?php
/**
 * Dado un array 10 elementos de números enteros (sin coma decimal), encontrar el máximo, y la media de los valores almacenados.
 */

$suma = 0;
$media = 0;

$numeros = array(1,2,3,4,5,6,7,8,9,10);
echo "<p> El número máximo es " . max($numeros)."</p>";

foreach ($numeros as $valornumeros) {
    $suma += $valornumeros;
}

$media = $suma / count($numeros);

echo "<p> La media de los números es "  . $media."</p>";
