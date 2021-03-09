<?php
    /**
     * Script que cargue las siguientes variables:
     *  $x=10;
     *  $y=7;
     *   y muestre
     *  10 + 7 = 17
     *  10 - 7 = 3
     *  10 * 7 = 70
     *  10 / 7 = 1.4285714285714
     *  10 % 7 = 3
     *
     * Autor: Antonio Quesada Cuadrado
     */

     $x=10;
     $y=7;
     $suma = $x + $y;
     $resta = $x - $y;
     $producto = $x * $y;
     $division = $x / $y;
     $resto = $x % $y;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculos</title>
</head>
<body>
    <?php
         echo "<p>Número 1: $x</p>";
         echo "<p>Número 2: $y</p>";
         echo "<hr></hr>";
         echo "<p>$x + $y = $suma</p>";
         echo "<p>$x - $y = $resta</p>";
         echo "<p>$x * $y = $producto</p>";
         echo "<p>$x / $y = $division</p>";
         echo "<p>$x % $y = $resto</p>";
    ?>
</body>
</html>