<?php
/**
 * Crea un script que defina un array de números enteros y utilizando una función anónima genere un
 * array con el cuadrado de los mismos.
 * 
 */

$numenteros = array(2,4,6);

$cuadrado = function($numenteros) {
    return $numenteros*$numenteros;
};
 


?>

