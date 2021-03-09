<?php
/**
 * Script que escriba el resultado de la suma de dos números almacenados en dos variables.
 * Autor: Antonio Quesada Cuadrado
 */
    $n1 = 3;
    $n2 = 5;
    $resultado = $n1+$n2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suma de números</title>
</head>
<body>
    <?php
        echo "<h2>Suma de dos Números</h2>";
        echo "<p>Número 1: $n1</p>";
        echo "<p>Número 2: $n2</p>";
        echo "<b><p>Suma: $resultado</p></b>"
    ?>
</body>
</html>