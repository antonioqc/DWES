<?php
/**
 * Crear un array con los alumnos de clase y permitir la selección aleatoria de uno de ellos.
 */

$aalumnos = array("Antonio", "Ruben", "Manolo", "Rafa", "David", "Jose Luis", "Maria", "Diego", "Jose");

echo "Los alumnos son:";
foreach ($aalumnos as $valornombre) {
    echo "<p>".$valornombre."</p>";
    
}
echo "<hr></hr>";

//Seleccion aleatoria
$aleatorio = array_rand($aalumnos,1);
echo "<p>Selección aleatoria: ".$aalumnos[$aleatorio]."</p>";
?> 
