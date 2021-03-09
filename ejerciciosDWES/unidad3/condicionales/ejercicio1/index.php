<?php
/**
 * Cargar en dos números en variables y escribir el mayor de ellos.
 * Autor: Antonio Quesada Cuadrado
 */
    $n1 = 2;
    $n2 = 6;
    $max = max($n1,$n2); //función maximo número
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php
        echo "<p>Número 1: $n1</p>";
        echo "<p>Número 2: $n2</p>";
        echo "<p>El mayor es $max</p>";
    ?>
</body>
</html>