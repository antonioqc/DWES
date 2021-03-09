<?php

/**
 * Escribe un script en php para calcular la letra del NIF a partir del número del DNI enviado en la URL: http://dominio.local/calculaletra?dni=>30182410.
 * La letra se obtiene calculando el resto de la división del número del DNI por 23. A cada resultado le corresponde una letra.
 * 0=>T, 1=>R, 2=>W, 3=>A, 4=>G, 5=>M, 6=>Y, 7=>F, 8=>P, 9=>D, 10=>X, 11=>B, 12=>N, 13=>J, 14=>Z, 15=>S, 16=>Q, 17=>V, 18=>H, 19=>L, 20=>C, 21=>K, 22=>E.
 * Utiliza un array para almacenar la relación letra, número.
 * 
 * Autor: Antonio Quesada Cuadrado
 */

//Array con letras de dni.

function letraDNI($dni)
{
    $letrasDni = array(
        0 => "T", 1 => "R", 2 => "W", 3 => "A", 4 => "G", 5 => "M", 6 => "Y", 7 => "F", 8 => "P", 9 => "D", 10 => "X", 11 => "B", 12 => "N", 13 => "J",
        14 => "Z", 15 => "S", 16 => "Q", 17 => "V", 18 => "H", 19 => "L", 20 => "C", 21 => "K", 22 => "E");
    $resultado = intval($dni) % 23;
    foreach ($letrasDni as $num => $letra) {
        if ($num == $resultado) {
            return $letra;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DNI</title>
</head>

<body>
    <h3>Para probar el siguiente ejercicio pasa por la url un dni, para saber su letra; por ejemplo: ?dni=>30182410</h3>
    <?php
    if (isset($_GET["dni"])) {
        echo "La letra del dni es la ";
        echo letraDNI($_GET["dni"]);        
    }
    ?>
</body>

</html>