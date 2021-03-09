<?php

/**
 * 4. Función recursiva que permita sumar los dígitos de un número pasado por la URL.
 */

function sumaDigitos($numero)
{
    if ($numero == 0) {
        return 0;
    } else {
        return sumaDigitos($numero / 10) + $numero % 10;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 4</title>
</head>

<body>
    <h3>Para probar el siguiente ejercicio pasa por la url un número, para saber la suma entre sus cifras; por ejemplo: ?numero=>53</h3>
    <?php
    if (isset($_GET["numero"])) {
        echo "La suma de los dígitos es ";
        echo sumaDigitos($_GET["numero"]);
    }
    ?>
</body>

</html>