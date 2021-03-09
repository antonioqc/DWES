<?php
/**
 * Sumar los 3 primeros números pares
 * Autor: Antonio Quesada Cuadrado
 */
$suma = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <?php
        echo "<h2>Suma de 3 números pares:</h2>";
        for ($i=1; $i<=6; $i++) { 
            if ($i%2==0) {
                echo "<p>$i</p>";
                $suma += $i;
            }   
        }

        echo "<p>La suma es $suma</p>";
           
    ?>
</body>
</html>