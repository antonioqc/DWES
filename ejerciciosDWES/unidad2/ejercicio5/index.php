<?php
/**
 * Escribir un script que declare una variable y muestre la siguiente información en pantalla:
 * Valor actual 8.
 * Suma 2. Valor ahora 10.
 * Resta 4. Valor ahora 6.
 * Multipica por 5. Valor ahora 30.
 * Divide por 3. Valor ahora 10.
 * Incrementa el valor en 1. Valor ahora 11.
 * Decrementa el valor en 1. Valor ahora 11.
 * 
 * Autor: Antonio Quesada Cuadrado
 */

 $valor = 8;
 $suma = $valor + 2;
 $resta = $suma - 4;
 $producto = $resta * 5;
 $division = $producto / 3;
 $incrementa = $division + 1;
 $decrementa = $incrementa - 1
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculos</title>
</head>
<body>
    <?php
        echo "<p>Valor actual $valor</p>";
        echo "<p>Suma 2. Valor ahora $suma</p>";
        echo "<p>Resta 4. Valor ahora $resta</p>";
        echo "<p>Multiplica por 5. Valor ahora $producto</p>";
        echo "<p>Divide por 3. Valor ahora $division</p>";
        echo "<p>Incrementa el valor en 1. Valor ahora $incrementa</p>";
        echo "<p>Decrementa el valor en 1. Valor ahora $decrementa</p>";
    ?>
</body>
</html>